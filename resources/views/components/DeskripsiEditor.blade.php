@props(['value' => ''])

<div class="w-full overflow-x-auto">
  <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
  <textarea 
      id="ckeditor_deskripsi"
      name="deskripsi"
      class="w-full min-h-[400px] border border-gray-300 rounded">
  {{ old('deskripsi', $value) }}</textarea>
</div>

@once
  @push('styles')
    <style>
      .ck.ck-editor__editable_inline {
        padding: 1rem 1.5rem !important;
        box-sizing: border-box !important;
      }

      .ck-content {
        padding: 1rem 1.5rem !important;
        box-sizing: border-box !important;
      }
    </style>
  @endpush

  @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
          .create(document.querySelector('#ckeditor_deskripsi'))
          .catch(error => {
            console.error(error);
          });
      });
    </script>
  @endpush
@endonce

