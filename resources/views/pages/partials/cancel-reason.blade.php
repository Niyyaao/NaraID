@php
    $required = $required ?? false;
    $showLabel = $showLabel ?? true;
    $oldOption = old('cancel_reason_option');
@endphp

<div data-cancel-reason data-required="{{ $required ? 1 : 0 }}">

    @if ($showLabel)
        <label class="small text-muted mb-1">
            Reason @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif


    <select name="cancel_reason_option"
        class="form-control cancel-reason-select @error('cancel_reason_option') is-invalid @enderror"
        {{ $required ? 'required' : '' }}>
        <option value="">-- Choose a reason --</option>
        @foreach ($reasons as $reason)
            <option value="{{ $reason }}" {{ $oldOption === $reason ? 'selected' : '' }}>{{ $reason }}
            </option>
        @endforeach
        <option value="other" {{ $oldOption === 'other' ? 'selected' : '' }}>Other</option>
    </select>
    @error('cancel_reason_option')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

    <textarea name="cancel_reason_other" rows="3"
        class="form-control mt-2 cancel-reason-other @error('cancel_reason_other') is-invalid @enderror"
        placeholder="Write your reason here..." style="display: none;">{{ old('cancel_reason_other') }}</textarea>
    @error('cancel_reason_other')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-cancel-reason]').forEach(box => {
            const select = box.querySelector('.cancel-reason-select');
            const other = box.querySelector('.cancel-reason-other');
            const toggle = () => {
                const isOther = select.value === 'other';
                other.style.display = isOther ? '' : 'none';
                other.required = isOther && box.dataset.required === '1';
            };
            select.addEventListener('change', toggle);
            toggle();
        });
    });
</script>
