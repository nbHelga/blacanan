@props(['value' => ''])

<div class="w-full overflow-x-auto mb-6 p-4 bg-white rounded shadow">
  <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
  <textarea 
      id="ckeditor_deskripsi"
      name="deskripsi"
      class="w-full min-h-[400px] border border-gray-300 rounded p-4 mb-2">
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
          .create(document.querySelector('#ckeditor_deskripsi'),{
            toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'insertTable', 'imageUpload']
          })
          .catch(error => {
            console.error(error);
          });
      });
    </script>
  @endpush
@endonce

