@include('charts::_partials.container.div')
<script>
var {{ $model->id }} = c3.generate({
    bindto: '#{{ $model->id }}',
    data: {
        columns: [
            @for($i = 0; $i < count($model->labels); $i++)
                ["{{ $model->labels[$i] }}", {{ $model->values[$i] }}],
            @endfor
        ],
        type: 'donut',
    },
    axis: {
        x: {
            type: 'category',
            categories: [@foreach($model->labels as $label)"{{ $label }}",@endforeach]
        },
        y: {
            label: {
                text: "{{ $model->element_label }}",
                position: 'outer-middle',
            }
        },
    }
});
</script>
