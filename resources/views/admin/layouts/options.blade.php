@foreach($options as $option)
    <option value="{!! $option->id !!}"
            @if ($option->id == $selected)
            selected
            @endif
    >{!! $option->name !!}</option>
    @php
        $children = $option->children;
    @endphp
    @if($children->count())
        @php
            $children = $option->children;
            if(empty($label)){
                $l = $option->name;
            }else{
                $l = $label .' > ' . $option->name;
            }
        @endphp
        <optgroup label="{!! $l !!}">
            @include('admin.layouts.options', ['options' => $children, 'selected' => $selected, 'label' => $l])
        </optgroup>
    @endif
@endforeach