<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use App\Models\FooterKontak;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::with('kontak')->first();
        return view('admin.footer.index', compact('footer'));
    }

    public function edit()
    {
        $footer = Footer::with('kontak')->first();
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'maps_link' => 'nullable|url',
        ]);

        $footer = Footer::first();
        if (!$footer) {
            $footer = new Footer();
        }

        $data = $request->only(['deskripsi', 'alamat']);

        // Convert Google Maps link to embed code
        if ($request->maps_link) {
            $mapsLink = $request->maps_link;

            // Extract coordinates or place ID from various Google Maps URL formats
            if (preg_match('/maps\.google\.com.*@(-?\d+\.\d+),(-?\d+\.\d+)/', $mapsLink, $matches)) {
                // Format: https://maps.google.com/maps?q=lat,lng
                $lat = $matches[1];
                $lng = $matches[2];
                $embedUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000!2d{$lng}!3d{$lat}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid";
            } elseif (preg_match('/maps\.google\.com.*\/embed\?pb=([^&"]+)/', $mapsLink, $matches)) {
                // Already an embed URL
                $embedUrl = $mapsLink;
            } elseif (preg_match('/maps\.google\.com.*\/place\/([^\/]+)/', $mapsLink, $matches)) {
                // Place URL format
                $place = urlencode($matches[1]);
                $embedUrl = "https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q={$place}";
            } else {
                // Fallback: try to extract any coordinates
                if (preg_match('/(-?\d+\.\d+),(-?\d+\.\d+)/', $mapsLink, $matches)) {
                    $lat = $matches[1];
                    $lng = $matches[2];
                    $embedUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000!2d{$lng}!3d{$lat}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid";
                } else {
                    $embedUrl = $mapsLink; // Use as is if can't parse
                }
            }

            $data['maps'] = '<iframe src="' . $embedUrl . '" class="w-full h-32 mb-2 rounded-lg border-0" allowfullscreen="" loading="lazy"></iframe>';
            $data['maps_link'] = $mapsLink;
        }

        $footer->fill($data);
        $footer->save();

        return redirect()->route('admin.footer.index')->with('success', 'Footer berhasil diupdate');
    }

    public function addKontak(Request $request)
    {
        $request->validate([
            'tipe' => 'required|string',
            'label' => 'nullable|string',
            'value' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $footer = Footer::first();
        if (!$footer) {
            $footer = Footer::create(['deskripsi' => '', 'alamat' => '']);
        }

        $kontakData = [
            'footer_id' => $footer->id,
            'tipe' => $request->tipe,
            'label' => $request->label,
            'value' => $request->value,
            'gambar' => null,
        ];

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $folder = "footer_kontak";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $file->storeAs($folder, $originalName, 'public');
            $kontakData['gambar'] = "{$folder}/{$originalName}";
        }

        FooterKontak::create($kontakData);

        return redirect()->route('admin.footer.edit')->with('success', 'Kontak berhasil ditambahkan');
    }

    public function editKontak($id)
    {
        $kontak = FooterKontak::findOrFail($id);
        return response()->json($kontak);
    }

    public function updateKontak(Request $request, $id)
    {
        $request->validate([
            'tipe' => 'required|string',
            'label' => 'nullable|string',
            'value' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $kontak = FooterKontak::findOrFail($id);
        $kontak->fill($request->except('gambar'));

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($kontak->gambar && Storage::disk('public')->exists($kontak->gambar)) {
                Storage::disk('public')->delete($kontak->gambar);
            }

            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $folder = "footer_kontak";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $file->storeAs($folder, $originalName, 'public');
            $kontak->gambar = "{$folder}/{$originalName}";
        }

        $kontak->save();

        return redirect()->route('admin.footer.edit')->with('success', 'Kontak berhasil diupdate');
    }

    public function deleteKontak($id)
    {
        $kontak = FooterKontak::findOrFail($id);

        // Delete image if exists
        if ($kontak->gambar && Storage::disk('public')->exists($kontak->gambar)) {
            Storage::disk('public')->delete($kontak->gambar);
        }

        $kontak->delete();
        return redirect()->route('admin.footer.edit')->with('success', 'Kontak berhasil dihapus');
    }
}
