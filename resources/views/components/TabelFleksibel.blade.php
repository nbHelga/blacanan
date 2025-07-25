@props([
  'headers' => [],
  'rows' => [],
  'detailRouteName' => '',
])

<div class="overflow-x-auto rounded-lg shadow">
  <table class="min-w-full bg-white">
    <thead>
      <tr>
        @foreach ($headers as $header)
          <th class="px-4 py-2 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            {{ $header }}
          </th>
        @endforeach
        <th class="px-4 py-2 border-b-2 border-gray-200 bg-gray-50"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($rows as $row)
        <tr>
          @php
            $rowId = $row['id'] ?? null;
            $displayData = collect($row)->except(['id'])->toArray();
          @endphp
          @foreach ($displayData as $key => $cell)
            <td class="px-4 py-2 border-b border-gray-200">{!! $cell !!}</td>
          @endforeach
          <td class="px-4 py-2 border-b border-gray-200">
            @if($rowId && $detailRouteName)
              <a href="{{ route($detailRouteName, ['id' => $rowId]) }}"
                 class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                Detail
              </a>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
