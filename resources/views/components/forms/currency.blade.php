<div x-data="" x-init="Inputmask('currency', {
    prefix: 'Rp',
    numericInput: true,
    rightAlign: true,
    autoUnmask: true,
    allowMinus: @json($allow_minus),
    digits: 0,
    groupSeparator: '.',
    onBeforeMask: function(value, opts) {
        if (null === value) { // fix charAt on null errors
            value = '0'
        }
        return value;
    }
}).mask($refs.input);">

    <input x-ref="input" x-on:change="$dispatch('input', $refs.input.value)" {{ $attributes }}
    onfocus="this.select();" />
</div>
