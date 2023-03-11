@props(['iterasi' => 0, 'targetBobot' => 0, 'dataBobot' => []])

<div>
    <math display="block">
        <mrow>
            <msub>
                <mi>W</mi>
                <mn>{{ $iterasi }}</mn>
            </msub>
            <mo>=</mo>
            <mn>{{ $targetBobot }}</mn>
            <mo lspace="0em" rspace="0em">/</mo>
            <mo form="prefix" stretchy="false">(</mo>

            @foreach ($dataBobot as $key => $data)
                <mn>{{ $data }}</mn>
                @if ($key < count($dataBobot) - 1)
                    <mo>+</mo>
                @endif
            @endforeach

            <mo form="postfix" stretchy="false">)</mo>
            <mo>=</mo>
            <mn>{{ round($targetBobot / collect($dataBobot)->sum(), 6) }}</mn>
        </mrow>
    </math>
</div>
