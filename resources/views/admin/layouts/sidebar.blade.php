{{-- filepath: resources/views/admin/layouts/sidebar.blade.php --}}
<aside class="w-46 pt-16 bg-blue-800 text-white h-screen fixed top-0 left-0 z-50 px-4 overflow-y-auto flex flex-col" style="background-color: #1e3a8a;">
  {{-- Logo --}}
  <div class="mt-8 text-center mb-10">
    <div class="text-3xl font-bold italic">SID</div>
    <div class="text-xl font-bold">Blacanan</div>
  </div>

  {{-- Menu --}}
  <div class="flex-1">
    <nav class="mt-4 space-y-2">
      <a href="{{ route('admin.dashboard') }}" class="flex items-center px-2 py-2 rounded-lg hover:bg-blue-600 transition">
        <span class="material-icons mr-3 px-4">dashboard</span>
        <span>Dashboard</span>
      </a>
      <a href="{{ route('admin.profil_desa.index') }}" class="flex items-center px-2 py-2 rounded-lg hover:bg-blue-600 transition">
        <span class="material-icons mr-3 px-4">account_balance</span>
        <span>Profil Desa</span>
      </a>
      <a href="{{ route('admin.content.index') }}" class="flex items-center px-2 py-2 rounded-lg hover:bg-blue-600 transition">
        <span class="material-icons mr-3 px-4">article</span>
        <span>Content</span>
      </a>
      <a href="{{ route('admin.sod.index') }}" class="flex items-center px-2 py-2 rounded-lg hover:bg-blue-600 transition">
        <span class="material-icons mr-3 px-4">groups</span>
        <span>SOD</span>
      </a>
      <a href="{{ route('admin.blog.index') }}" class="flex items-center px-2 py-2 rounded-lg hover:bg-blue-600 transition">
        <span class="material-icons mr-3 px-4">feed</span>
        <span>Blog</span>
      </a>
      <a href="{{ route('admin.umkm.index') }}" class="flex items-center px-2 py-2 rounded-lg hover:bg-blue-600 transition">
        <span class="material-icons mr-3 px-4">store</span>
        <span>UMKM</span>
      </a>
      <a href="{{ route('admin.footer.index') }}" class="flex items-center px-2 py-2 rounded-lg hover:bg-blue-600 transition">
        <span class="material-icons mr-3 px-4">settings</span>
        <span>Footer</span>
      </a>
    </nav>
  </div>

  {{-- Logout --}}
  <form action="{{ route('logout') }}" method="POST" class="mb-4">
    @csrf
    <button type="submit" class="flex items-center px-2 py-2 rounded-lg bg-red-700 hover:bg-red-600 transition w-full font-semibold">
      <span class="material-icons mr-3">logout</span>
      <span>Logout</span>
    </button>
  </form>
</aside>