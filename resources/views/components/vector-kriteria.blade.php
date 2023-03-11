@props(['iterasi' => 0, 'targetVector' => 0, 'dataVector' => []])

<div>
    <math display="block">
        <mrow>
            <msub>
                <mi>V</mi>
                <mn>{{ $iterasi }}</mn>
            </msub>
            <mo>=</mo>
            <mn>{{ round($targetVector, 6) }}</mn>
            <mo lspace="0em" rspace="0em">/</mo>
            <mo form="prefix" stretchy="false">(</mo>

            @foreach ($dataVector as $key => $data)
                <mn>{{ round($data, 6) }}</mn>
                @if ($key < count($dataVector) - 1)
                    <mo>+</mo>
                @endif
            @endforeach

            <mo form="postfix" stretchy="false">)</mo>
            <mo>=</mo>
            <mn>{{ round($targetVector / collect($dataVector)->sum(), 6) }}</mn>
        </mrow>
    </math>
</div>
