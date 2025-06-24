# Lab7Web - Praktikum 1: PHP Framework (CodeIgniter 4)

## 👤 Nama: Gilang Ramadhan  
## 🏫 NIM: 312310XYZ  
## 💡 Modul: Praktikum 1 - PHP Framework

---

## 📌 Langkah Praktikum

### ✅ Instalasi
- Download CodeIgniter 4 dari [https://codeigniter.com](https://codeigniter.com)
- Ekstrak ke `htdocs/lab11_ci/ci4`
- Akses: `http://localhost/lab11_ci/ci4/public`

### ✅ Aktifkan Ekstensi PHP
- `json`, `mysqli`, `xml`, `intl`, `curl`  
- Edit `php.ini` → hapus `;` di depan extension

### ✅ Mode Development
- Rename file `env` jadi `.env`
- Ubah jadi: `CI_ENVIRONMENT = development`
### 📸 Screenshot

#### Halaman About
![Screenshot 2025-06-23 125837](https://github.com/user-attachments/assets/89170122-43b7-4b33-8550-1c0b825bb371)

#### Halaman Contact
![Screenshot 2025-06-23 125826](https://github.com/user-attachments/assets/c7680998-6352-4fe8-a6b2-ef7d8b76782c)

#### Halaman FAQs
![Screenshot 2025-06-23 125815](https://github.com/user-attachments/assets/a8d9aa7a-7587-4237-bc40-5904fe0465da)

#### php spark CLI
![Screenshot 2025-06-23 130441](https://github.com/user-attachments/assets/4aed3685-c34b-4f62-baac-adcf9a397844)
---

### ✅ Routing & Controller
- Tambahkan route:
```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
