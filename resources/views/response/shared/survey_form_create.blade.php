@php
    use App\Enums\ResponseLevel;
@endphp

{{-- Counter for row number --}}
@php $counter = 0; @endphp

@foreach ($types as $type)
<div class="m-b:8">
    <h2 class="title is-2">
        Survey {{ $type->name }}
    </h2>

    @foreach ($type->criteria as $criterion)
    <h3 class="title is-4">
        {{ $loop->iteration }}.
        Kriteria {{ $criterion->name }}
    </h3>

    <table class="table is-narrow is-striped is-bordered">
        <thead>
            <tr>
                <th> No. </th>
                <th> Kriteria </th>
                <th> Alternatif </th>
                <th> Bobot / Tingkat Kepentingan </th>
                <th> Keterangan </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($criterion->sub_criteria as $sub_criterion)

            @php
                if ($sub_criterion->alternatives->count() > 0) {
                    $rowspan = $sub_criterion->alternatives->count();
                    $first_alternative = $sub_criterion->alternatives->first();
                }
                else {
                    $rowspan = 1;
                    $first_alternative = new App\Alternative();
                    $first_alternative->name = "-";
                }
            @endphp

            <tr>
                <td rowspan="{{ $rowspan }}"> {{ $loop->iteration }}. </td>
                <td rowspan="{{ $rowspan }}"> {{ $sub_criterion->name }}. </td>
                <td rowspan="1"> {{ $first_alternative->name }} </td>
                <td rowspan="1">
                    <div class="select">
                        <select name="survey_data[{{ $counter }}][rating]">
                            @foreach (ResponseLevel::toArray() as $key => $level)
                            <option {{ old("survey_data.$counter.rating") === $key ? 'selected' : '' }} value="{{ $key }}">
                                {{ $level }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td rowspan="1">
                    <textarea name="survey_data[{{ $counter }}][note]" cols="15" rows="2" class="textarea">{{ old("survey_data.$counter.note") }}</textarea>
                </td>

                <input type="hidden" name="survey_data[{{ $counter }}][type_id]" value="{{ $type->id }}">
                <input type="hidden" name="survey_data[{{ $counter }}][criterion_id]" value="{{ $criterion->id }}">
                <input type="hidden" name="survey_data[{{ $counter }}][sub_criterion_id]" value="{{ $sub_criterion->id }}">
                <input type="hidden" name="survey_data[{{ $counter }}][alternative_id]" value="{{ $first_alternative->id }}">

                @php ++$counter @endphp
            </tr>

            @for ($i = 1; $i < $sub_criterion->alternatives->count(); ++$i)
            <tr>
                {{-- <td></td> --}}
                {{-- <td></td> --}}
                <td> {{ $sub_criterion->alternatives[$i]->name }} </td>
                <td>
                    <div class="select">
                        <select name="survey_data[{{ $counter }}][rating]">
                            @foreach (ResponseLevel::toArray() as $key => $level)
                            <option value="{{ $key }}">
                                {{ $level }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td>
                    <textarea name="survey_data[{{ $counter }}][note]" cols="15" rows="2" class="textarea">{{ old("survey_data.$counter.note") }}</textarea>
                </td>

                <input type="hidden" name="survey_data[{{ $counter }}][type_id]" value="{{ $type->id }}">
                <input type="hidden" name="survey_data[{{ $counter }}][criterion_id]" value="{{ $criterion->id }}">
                <input type="hidden" name="survey_data[{{ $counter }}][sub_criterion_id]" value="{{ $sub_criterion->id }}">
                <input type="hidden" name="survey_data[{{ $counter }}][alternative_id]" value="{{ $sub_criterion->alternatives[$i]->id }}">

                @php ++$counter @endphp
            </tr>
            @endfor

            @endforeach
        </tbody>
    </table>

    @endforeach
</div>
@endforeach