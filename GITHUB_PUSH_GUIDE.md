# Panduan Push Code ke GitHub

## Repository GitHub
- **URL**: https://github.com/ramadhan231005/tugasweb2.git
- **Username**: ramadhan231005

---

## ⚙️ SETUP AWAL (Hanya 1x)

### Step 1: Konfigurasi Git Identity
Jalankan perintah ini di terminal project Anda:

```bash
git config --global user.name "Nama Anda"
git config --global user.email "email@gmail.com"
```

**Contoh:**
```bash
git config --global user.name "Ramadhan"
git config --global user.email "ramadhan231005@gmail.com"
```

### Step 2: Setup Remote Repository
Jika belum ada, tambahkan remote origin:

```bash
git remote add origin https://github.com/ramadhan231005/tugasweb2.git
```

Verifikasi dengan:
```bash
git remote -v
```

Seharusnya tampil:
```
origin  https://github.com/ramadhan231005/tugasweb2.git (fetch)
origin  https://github.com/ramadhan231005/tugasweb2.git (push)
```

---

## 📤 PUSH CODE (Setiap kali ada perubahan)

### Step 1: Cek Status Perubahan
```bash
git status
```

Akan menampilkan file yang berubah (merah) dan file yang sudah di-stage (hijau).

### Step 2: Tambahkan Semua Perubahan
```bash
git add .
```

Atau untuk file spesifik:
```bash
git add nama_file.php
```

Verifikasi dengan:
```bash
git status
```

Sekarang file seharusnya berwarna hijau (staged).

### Step 3: Buat Commit
```bash
git commit -m "Pesan commit Anda di sini"
```

**Contoh pesan commit yang baik:**
```bash
git commit -m "Fix: Perbaiki error ProductService di Controller"
git commit -m "Feat: Tambahkan fitur delete dengan role admin"
git commit -m "Refactor: Reorganisasi struktur folder Models"
```

### Step 4: Push ke GitHub
```bash
git push -u origin master
```

Atau jika sudah pernah push sebelumnya:
```bash
git push
```

---

## 🔐 Autentikasi GitHub

### Opsi 1: HTTPS dengan Personal Access Token (Recommended)
1. Buka GitHub → Settings → Developer settings → Personal access tokens → Tokens (classic)
2. Click "Generate new token"
3. Pilih scopes: `repo` (untuk access repository)
4. Copy token dan simpan di tempat aman
5. Saat diminta password, gunakan token tersebut sebagai password

### Opsi 2: SSH Key (Lebih aman)
1. Generate SSH key:
```bash
ssh-keygen -t ed25519 -C "email@gmail.com"
```

2. Tekan Enter sampai selesai

3. Copy SSH key:
```bash
# Windows
type %userprofile%\.ssh\id_ed25519.pub | clip

# atau buka file manual di: C:\Users\YourUsername\.ssh\id_ed25519.pub
```

4. Buka GitHub → Settings → SSH and GPG keys → New SSH key
5. Paste SSH key Anda

6. Test koneksi:
```bash
ssh -T git@github.com
```

---

## 📋 Checklist Setiap Kali Push

```
[ ] Sudah testing code secara local? (buka di browser http://localhost:8000)
[ ] Sudah cek git status? (git status)
[ ] Sudah add files? (git add .)
[ ] Sudah membuat commit dengan pesan yang jelas? (git commit -m "...")
[ ] Sudah push? (git push)
[ ] Sudah verifikasi di GitHub website?
```

---

## 🛠️ Command Cepat

| Perintah | Fungsi |
|----------|--------|
| `git status` | Lihat status perubahan |
| `git add .` | Stage semua file |
| `git commit -m "pesan"` | Buat commit |
| `git push` | Push ke GitHub |
| `git pull` | Pull perubahan dari GitHub |
| `git log` | Lihat history commit |
| `git diff` | Lihat perubahan file detail |

---

## ❓ Troubleshooting

### Error: "fatal: Not a git repository"
**Solusi:**
```bash
cd d:\web2\tugasweb2
git init
```

### Error: "Permission denied (publickey)"
**Solusi:** Setup SSH key atau gunakan HTTPS dengan Personal Access Token

### Error: "Please tell me who you are"
**Solusi:**
```bash
git config --global user.name "Nama Anda"
git config --global user.email "email@gmail.com"
```

### Ingin batalkan perubahan file?
```bash
git checkout -- nama_file.php
```

### Ingin undo commit terakhir?
```bash
git reset --soft HEAD~1
```

---

## 📝 Contoh Workflow Lengkap

```bash
# 1. Cek status
git status

# 2. Add semua file
git add .

# 3. Commit dengan pesan
git commit -m "Feat: Tambahkan ProductService dan perbaiki error di controllers"

# 4. Push ke GitHub
git push

# 5. Verifikasi di GitHub: https://github.com/ramadhan231005/tugasweb2
```

---

**Catatan:** Setiap kali ada perubahan, ulangi Step 1-4 dari bagian "PUSH CODE"
