<?php

namespace App\Http\Livewire;

use App\Models\Expending;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $reviews = [];
    public $traceOrder = [];
    public $ratings = [];
    public $detailOrder;
    public $reviewModal = false;
    public $detailModal = false;
    public $cancelModal = false;
    public $feedbackModal = false;

    protected $listeners = [
        'orderRender' => 'render',
    ];

    public function openModalReview($id)
    {
        $this->ratings = [];
        $this->reviews = [];

        $this->detailOrder = Expending::where('expendings.id', $id)->where('expendings.user_id', Auth::id())
            ->selectRaw('expendings.*, statuses.nama as statuses_nama')
            ->join('traces', 'expendings.id', '=', 'traces.expending_id')
            ->join('statuses', 'traces.status_id', '=', 'statuses.id')
            // ->join('reviews', 'expendings.id', '=', 'reviews.expending_id', 'left outer')
            ->join(
                DB::raw("(select traces.expending_id, MAX(traces.created_at) as traces_created_at from `expendings` inner join `traces` on `expendings`.`id` = `traces`.`expending_id` group by traces.expending_id) join_traces"),
                fn ($join) =>
                $join
                    ->on('traces.expending_id', '=', 'join_traces.expending_id')
                    ->on('traces.created_at', '=', 'join_traces.traces_created_at')
            )->first();

        if ($this->detailOrder) {

            $review = Review::where('expending_id', $id)->where('user_id', Auth::id())->get();

            if ($review) {
                $review->each(function ($item) {
                    $this->ratings[$item->stok_id] = $item->rating;
                    $this->reviews[$item->stok_id] = $item->summary;
                });
            } else {
                foreach ($this->detailOrder->stok_data as $stok) {
                    $this->ratings[$stok['id']] = 5;
                    $this->reviews[$stok['id']] = ' ';
                }
            }

            $this->reviewModal = true;
        }
    }

    public function submitReview()
    {
        foreach ($this->detailOrder->stok_data as $stok) {
            Review::create([
                'user_id' => Auth::id(),
                'stok_id' => $stok['id'],
                'expending_id' => $this->detailOrder->id,
                'summary' => $this->reviews[$stok['id']],
                'rating' => $this->ratings[$stok['id']],
            ]);
        }

        Trace::create([
            'expending_id' => $this->detailOrder->id,
            'status_id' => Status::where('nama', 'Rated')->first()->id,
        ]);

        $this->reviewModal = false;
    }

    public function openModalDetail($id)
    {
        $this->detailOrder = Expending::where('expendings.id', $id)->where('expendings.user_id', Auth::id())
            ->selectRaw('expendings.*, statuses.nama as statuses_nama')
            ->join('traces', 'expendings.id', '=', 'traces.expending_id')
            ->join('statuses', 'traces.status_id', '=', 'statuses.id')
            ->join(
                DB::raw("(select traces.expending_id, MAX(traces.created_at) as traces_created_at from `expendings` inner join `traces` on `expendings`.`id` = `traces`.`expending_id` group by traces.expending_id) join_traces"),
                fn ($join) =>
                $join
                    ->on('traces.expending_id', '=', 'join_traces.expending_id')
                    ->on('traces.created_at', '=', 'join_traces.traces_created_at')
            )->first();

        if ($this->detailOrder) {

            $this->traceOrder = Trace::where('expending_id', $this->detailOrder->id)
                ->join('statuses', 'traces.status_id', '=', 'statuses.id')
                ->selectRaw('statuses.*')
                ->get();

            $this->detailModal = true;
        }
    }

    public function cancelOrder()
    {
        $cancelStatus = Status::where('nama', 'Canceled')->first();

        $this->detailOrder->update([
            'status_id' => $cancelStatus->id,
        ]);

        Trace::create([
            'expending_id' => $this->detailOrder->id,
            'status_id' => $cancelStatus->id,
        ]);

        $this->cancelModal = false;
        $this->feedbackModal = true;
        $this->emit('orderRender');
    }

    public function render()
    {
        return view('livewire.order', [
            'orders' => Expending::where('user_id', Auth::id())
                ->selectRaw('expendings.*, statuses.nama as statuses_nama')
                ->join('traces', 'expendings.id', '=', 'traces.expending_id')
                ->join('statuses', 'traces.status_id', '=', 'statuses.id')
                ->join(
                    DB::raw("(select traces.expending_id, MAX(traces.created_at) as traces_created_at from `expendings` inner join `traces` on `expendings`.`id` = `traces`.`expending_id` group by traces.expending_id) join_traces"),
                    fn ($join) =>
                    $join
                        ->on('traces.expending_id', '=', 'join_traces.expending_id')
                        ->on('traces.created_at', '=', 'join_traces.traces_created_at')
                )
                ->latest()
                ->paginate(10)
        ]);
    }
}
