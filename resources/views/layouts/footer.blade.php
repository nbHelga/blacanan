<!-- FOOTER SECTION -->
<footer class="bg-gray-900 text-gray-300 py-12">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <h4 class="text-white font-bold text-lg mb-2">Tentang Desa</h4>
            <p>
                {{ $footer->deskripsi ?? 'Desa Blacanan, Kecamatan Siwalan, terus berinovasi untuk menghadirkan pelayanan publik yang modern, cepat, dan transparan.' }}
            </p>
        </div>
        <div>
            <h4 class="text-white font-bold text-lg mb-2">Lokasi</h4>
            @if(!empty($footer->maps))
                {!! $footer->maps !!}
            @else
                <iframe src="https://www.google.com/maps/embed?pb=!1m18..." class="w-full h-32 mb-2 rounded-lg border-0" allowfullscreen="" loading="lazy"></iframe>
            @endif
            <p class="text-sm">{{ $footer->alamat ?? 'Jl. Raya Blacanan No. 1, Siwalan, Pekalongan' }}</p>
        </div>
        <div>
            <h4 class="text-white font-bold text-lg mb-4">Kontak</h4>
            <ul class="space-y-3">
                @if(isset($footer->kontak) && count($footer->kontak))
                    @foreach($footer->kontak as $kontak)
                        <li class="flex items-center space-x-3">
                            @switch($kontak->tipe)
                                @case('email')
                                    <span class="material-icons text-green-400">email</span>
                                    <a href="mailto:{{ $kontak->value }}" class="hover:text-green-400">{{ $kontak->value }}</a>
                                    @break
                                @case('phone')
                                    <span class="material-icons text-green-400">phone</span>
                                    <a href="tel:{{ $kontak->value }}" class="hover:text-green-400">{{ $kontak->value }}</a>
                                    @break
                                @case('facebook')
                                    <span class="material-icons text-blue-400">facebook</span>
                                    <a href="{{ $kontak->value }}" target="_blank" rel="noopener" class="hover:text-blue-400">{{ $kontak->label ?? 'Facebook' }}</a>
                                    @break
                                @case('instagram')
                                    <span class="material-icons text-pink-400">instagram</span>
                                    <a href="{{ $kontak->value }}" target="_blank" rel="noopener" class="hover:text-pink-400">{{ $kontak->label ?? 'Instagram' }}</a>
                                    @break
                                @default
                                    <span class="material-icons text-gray-400">contact_mail</span>
                                    <span>{{ $kontak->label ?? $kontak->tipe }}: {{ $kontak->value }}</span>
                            @endswitch
                        </li>
                    @endforeach
                @else
                    <li class="flex items-center space-x-3">
                        <span class="material-icons text-green-400">email</span>
                        <a href="mailto:desa_blacanan@yahoo.com" class="hover:text-green-400">desa_blacanan@yahoo.com</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <span class="material-icons text-green-400">email</span>
                        <a href="mailto:ppaddesablacanan@gmail.com" class="hover:text-green-400">ppaddesablacanan@gmail.com</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <span class="material-icons text-green-400">phone</span>
                        <a href="tel:085870000941" class="hover:text-green-400">0858 7000 0941</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <span class="material-icons text-blue-400">facebook</span>
                        <a href="https://facebook.com/blacanan.kecsiwalan" target="_blank" rel="noopener" class="hover:text-blue-400">Blacanan Kec Siwalan</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <span class="material-icons text-pink-400">instagram</span>
                        <a href="https://instagram.com/desablacanan" target="_blank" rel="noopener" class="hover:text-pink-400">@desablacanan</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="text-center text