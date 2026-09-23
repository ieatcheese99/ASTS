# PRD: Purnomo — Website Company Profile Promosi Coto Makassar

**Untuk:** Ujian Praktik On The Spot Coding — CodeIgniter 4 + Tailwind CSS (CDN) + MySQL
**Siswa:** Zabdan Harjati Purnomo · No. Absen 24 · Daerah: Sulawesi Selatan
**Makanan:** Coto Makassar · **Aksen wajib:** `#EA580C` · **Fitur wajib tambahan:** Sorting, Validasi Form
**Waktu:** 60 menit / 4 fase @15 menit, 4 commit git

---

## 1. Konsep & Arah Brand

**Nama:** Purnomo (nama belakang siswa, sesuai ketentuan ujian)
**Arah visual:** *Heritage-elegan* — mengangkat budaya Bugis-Makassar (kapal phinisi, songket, lontara), bukan gaya fast-food generik meski contoh acuan (KFC, Pizza Hut) bergaya modern. "Modern" di sini berarti *craft* rapi, bukan template SaaS.

**Kenapa bukan kombinasi krem + terracotta biasa:** `#EA580C` sudah ditentukan panitia, jadi jangan dipasangkan dengan background krem (#F4F1EA) + serif kontras tinggi — itu kombinasi paling umum dipakai AI generator. Sebagai gantinya, jadikan oranye sebagai **aksen kecil** (CTA, harga, hover), dan bangun palet inti dari warna budaya Bugis-Makassar.

### Palet Warna
**Dua warna wajib dari tabel tugas:** `#EA580C` dan `#172554` — keduanya persis kode Tailwind (`orange-600` & `blue-950`), jadi tinggal dipakai lewat class Tailwind langsung (`bg-blue-950`, `text-orange-600`, dst), tidak perlu extend config.

| Nama | Hex | Peran | Status |
|---|---|---|---|
| Biru Malam Bugis | `#172554` | background gelap utama (header, footer, hero) — dimaknai sebagai laut malam tempat kapal phinisi berlayar | **wajib** |
| Coto Orange | `#EA580C` | aksen: CTA, harga, ikon aktif, garis hover | **wajib** |
| Kertas Lontar | `#F1E7D3` | background terang (section konten) — sengaja beda tone dari krem AI (#F4F1EA), lebih kekuningan seperti kertas lontar | pendukung |
| Sutra Emas | `#C9A227` | detail garis, border tipis, highlight motif songket | pendukung |
| Tinta | `#241C15` | teks body di atas background terang | pendukung |
| Kabut Biru | `#EFF3FA` | teks/elemen di atas background biru gelap (pengganti putih polos) | pendukung |

### Tipografi
- **Display/Judul:** `Fraunces` (serif hangat, punya karakter, bukan Playfair yang generik) — dipakai bold untuk hero & judul section.
- **Body/UI:** `Plus Jakarta Sans` — font buatan desainer Indonesia, cocok secara naratif dan tidak se-default Inter/Poppins.
- Satu aksen kata dalam headline **dilarang** (hindari 1 kata di-italic/warna beda — ciri khas AI). Hierarki dibangun lewat ukuran & spacing, bukan warna parsial.
- Line-length maksimal ~75 karakter untuk body text.

### Motif & Elemen Grafis
- Motif garis geometris songket dipakai **tipis, sebagai divider**, bukan clipart besar.
- Siluet kapal phinisi dipakai *satu kali* di hero (SVG sederhana, bukan foto stok).
- Aksara lontara boleh jadi watermark sangat samar (opacity ~5%) di background section "Cerita Kami" — dekorasi budaya, bukan gimmick.
- **Hindari:** eyebrow label ALL CAPS di atas tiap judul, meta info dipisah "·", card seragam dengan shadow abu generik, tombol dengan "→" di akhir teks.

---

## 2. Sitemap

**Publik**
1. Beranda (company profile: hero, cerita/about, keunggulan, menu unggulan + marquee, galeri, testimoni, lokasi/kontak, footer)
2. Menu (daftar lengkap ≥8 varian, dengan **Sorting**)
3. Detail Menu (per item)

**Admin**
4. Login Admin
5. Dashboard (list menu + aksi CRUD)
6. Form Tambah/Edit Menu (dengan **Validasi Form**)

---

## 3. Spesifikasi Halaman

### 3.1 Beranda
| Section | Isi | Catatan desain |
|---|---|---|
| Hero | Judul "Purnomo", tagline warisan Bugis-Makassar, 1 foto/ilustrasi coto, CTA "Lihat Menu" | Background Biru Malam Bugis + siluet phinisi tipis di sisi kanan |
| Cerita Kami | 2–3 paragraf narasi keluarga/tradisi Coto Makassar | Watermark lontara samar |
| Keunggulan | 3 poin (bumbu rempah 40 jenis, resep turun-temurun, dst) | Ikon garis tipis, bukan card kotak identik |
| **Menu Unggulan (Marquee)** | Strip foto 6–8 varian coto berjalan otomatis horizontal | Lihat panduan §4 |
| Galeri | Grid foto suasana/dapur | Rasio gambar konsisten, tanpa border-radius seragam berlebihan |
| Testimoni | 2–3 kutipan pelanggan | Ditampilkan bergantian (fade), bukan carousel dengan panah generik |
| Lokasi & Kontak | Alamat, jam buka, peta/CTA WhatsApp | — |

### 3.2 Menu (dengan Sorting)
- Grid/list kartu menu (nama, foto, harga, kategori).
- **Fitur Sorting (wajib):** dropdown/select untuk urutkan berdasarkan **Harga (Termurah/Termahal)** dan **Nama (A–Z)**. Implementasi: query param `?sort=harga_asc|harga_desc|nama_asc` diproses di Controller → Model `orderBy()`.
- Filter kategori opsional (mis. Coto, Minuman, Pelengkap) jika waktu cukup — bukan wajib.

### 3.3 Detail Menu
- Foto besar, deskripsi, harga, bahan utama, tombol kembali ke menu.

### 3.4 Login Admin
- Form sederhana (username/password), styled sesuai brand (bukan Bootstrap default polos).
- Validasi: field kosong → pesan error inline berwarna Coto Orange, bukan alert merah generik bawaan browser.

### 3.5 Dashboard Admin
- Tabel daftar menu + aksi Edit/Hapus.
- Header kolom bisa diklik untuk sorting cepat (opsional, reuse logic §3.2).

### 3.6 Form Tambah/Edit Menu (dengan Validasi Form)
**Field:** nama_makanan, deskripsi, harga, kategori, gambar.

**Aturan Validasi (server-side, CodeIgniter Validation Library):**
| Field | Rule |
|---|---|
| nama_makanan | required, min_length[3], max_length[100] |
| deskripsi | required, min_length[10] |
| harga | required, numeric, greater_than[0] |
| kategori | required, in_list[coto,minuman,pelengkap] |
| gambar | required saat create, uploaded[gambar], mime_in (jpg/png), max_size 2048KB |

- Error ditampilkan **inline di bawah field terkait** (teks kecil navy `#172554` + ikon seru tipis), bukan satu box alert merah di atas form.
- Tambahkan validasi ringan client-side (`required`, `type="number"` di HTML) sebagai lapis pertama, tetap wajib server-side sebagai validasi utama.

---

## 4. Panduan Elemen Marquee & Frontend Menarik

**Marquee (menu berjalan):** JANGAN pakai tag `<marquee>` HTML lama atau teks neon berjalan generik. Buat dengan CSS: track flex berisi foto+nama menu, duplikasi track 2x, animasi `translateX` infinite linear via `@keyframes`, pause on hover (`animation-play-state: paused`). Beri gradient mask tipis di kedua ujung container agar transisi halus, bukan terpotong kasar.

**Elemen lain yang membuat modern tanpa terasa template AI:**
- Hover kartu menu: bukan sekadar shadow membesar — tampilkan lapisan info tambahan (bahan utama) muncul dari bawah foto.
- Satu momen animasi terkoordinasi saat hero pertama kali dimuat (fade+rise judul lalu foto), **jangan** animasi fade-slide di setiap section — itu ciri khas generik.
- Sticky navbar tipis dengan garis bawah Sutra Emas saat scroll, bukan navbar shadow tebal default.
- Empty state saat data kosong (mis. belum ada menu di admin): ilustrasi garis sederhana + teks aktif "Belum ada menu — tambahkan varian pertama", bukan teks default "No data".
- Tombol CTA konsisten nama aksinya dari awal sampai notifikasi (mis. tombol "Simpan Menu" → toast "Menu tersimpan", bukan berubah jadi "Submit successful").

---

## 5. Struktur Database (MySQL)

```sql
CREATE TABLE admins (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255)
);

CREATE TABLE menus (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nama_makanan VARCHAR(100),
  deskripsi TEXT,
  harga DECIMAL(10,2),
  kategori ENUM('coto','minuman','pelengkap'),
  gambar VARCHAR(255),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```
Minimal 8 baris seed data varian Coto Makassar (Coto Daging, Coto Campur, Coto Iga, Es Palu Butung, Buras, dst).

---

## 6. Struktur Proyek CodeIgniter 4 (ringkas)
```
app/Controllers/ Home.php, Menu.php, Auth.php, Admin/Menu.php
app/Models/      MenuModel.php, AdminModel.php
app/Views/       layouts/main.php, home.php, menu/index.php, menu/detail.php,
                 auth/login.php, admin/dashboard.php, admin/form.php
public/          uploads/ (folder gambar menu)
```
**Tailwind:** via CDN `<script src="https://cdn.tailwindcss.com"></script>` + `tailwind.config` inline untuk extend warna custom (`coto-orange`, `malam-hitam`, `sutra-emas`, `laut-bugis`, `kertas-lontar`) dan font (`Fraunces`, `Plus Jakarta Sans` via Google Fonts).

---

## 7. Rencana Commit (sesuai 4 fase ujian)

| Fase (~15 mnt) | Commit message | Target |
|---|---|---|
| 1 | `Setup database & migration Coto Makassar` | Migration tabel `menus` & `admins`, seeding 8 varian |
| 2 | `CRUD dasar + tampilan Tailwind Coto Makassar` | CRUD admin jalan, layout Tailwind + palet brand terpasang |
| 3 | `Halaman detail + fitur tambahan + gambar AI Coto Makassar` | Halaman detail, **Sorting** menu, gambar hero/menu (AI-generated diizinkan), marquee |
| 4 | `Finalisasi Coto Makassar` | **Validasi form** lengkap, empty state, polish responsif, push final |

---

## 8. Checklist Definisi Selesai
- [ ] Homepage lengkap (hero, cerita, keunggulan, marquee, galeri, testimoni, kontak)
- [ ] Menu ≥8 varian, bisa di-sort (harga/nama)
- [ ] Halaman detail menu
- [ ] Login admin + validasi
- [ ] CRUD menu admin + validasi form lengkap (server-side)
- [ ] Palet & tipografi brand konsisten di semua halaman
- [ ] Responsif mobile
- [ ] 4 commit sesuai pesan di atas, ter-push ke GitHub

---

## 9. Panduan Prompt untuk AI Coding Assistant

Gunakan prompt ini per fase ke Claude/Copilot/ChatGPT agar output konsisten dengan brief:

**Fase 1:**
> "Buatkan migration CodeIgniter 4 untuk tabel `menus` (id, nama_makanan, deskripsi, harga, kategori enum coto/minuman/pelengkap, gambar, created_at) dan `admins` (id, username, password). Sertakan seeder 8 varian Coto Makassar."

**Fase 2:**
> "Buatkan Controller & Model CRUD untuk tabel menus di CodeIgniter 4, tampilkan dengan Tailwind CDN. Palet: background #F1E7D3, teks #241C15, aksen #EA580C, navy wajib #172554, gold #C9A227. Font: Fraunces untuk judul, Plus Jakarta Sans untuk body. Jangan pakai kombinasi krem+terracotta khas AI, jangan pakai card shadow seragam generik."

**Fase 3:**
> "Buatkan halaman detail menu + halaman menu dengan fitur sorting (query param sort=harga_asc|harga_desc|nama_asc) + section marquee CSS (bukan tag <marquee>, pakai keyframes translateX, pause on hover) menampilkan foto menu berjalan. Style konsisten brand heritage Bugis-Makassar di atas."

**Fase 4:**
> "Tambahkan validasi form CodeIgniter (server-side) untuk form tambah/edit menu: nama_makanan required min 3, deskripsi required min 10, harga required numeric >0, kategori in_list, gambar required saat create dengan mime jpg/png max 2MB. Tampilkan error inline di bawah tiap field dengan warna #172554, bukan alert box merah generik."

---

**Ada bagian yang mau diperjelas atau diperluas** (mis. detail wireframe tiap section, contoh kode Tailwind config, atau draft copywriting per section)? Tanya saja.
