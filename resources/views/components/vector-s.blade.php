@props(['iterasi' => 0, 'dataVector' => []])

<div>
    <math display="block">
        <mrow>
            <msub>
                <mi>S</mi>
                <mn>{{ $iterasi }}</mn>
            </msub>
            <mo>=</mo>

            @foreach ($dataVector as $key => $data)
                <msup>
                    <mo>{{ $data['k_value'] }}</mo>
                    <mn>{{ round($data['pangkat'], 6) }}</mn>
                </msup>
                @if ($key < count($dataVector) - 1)
                    <mo>*</mo>
                @endif
            @endforeach

            <mo>=</mo>
            <mn>{{ round(collect($dataVector)->map(fn($x) => pow($x['k_value'], $x['pangkat']))->reduce(fn ($product, $value) => $product * $value, 1), 6) }}</mn>
        </mrow>
    </math>
</div>
