<input id="{{ $name }}_x" type="hidden" name="{{ $name }}_x" value="">
<input id="{{ $name }}_y" type="hidden" name="{{ $name }}_y" value="">
<input id="{{ $name }}_width" type="hidden" name="{{ $name }}_width" value="">
<input id="{{ $name }}_height" type="hidden" name="{{ $name }}_height" value="">

<div class="{{ $containerClass }}">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input id="{{ $name }}" class="form-control cropper-input" type="file" name="{{ $name }}" data-width="{{ $width }}" data-height="{{ $height }}">
</div>
