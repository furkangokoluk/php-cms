# PHP Basic CMS

Bu proje, PHP ile geliştirilmiş **basit bir İçerik Yönetim Sistemi (CMS)** örneğidir.  
Temel seviyede içerik ve kullanıcı yönetimi işlemlerini içerir.

## Kullanılan Teknolojiler

- PHP
- MySQL
- HTML / CSS

## Dosya Yapısı

```
CMS/
├── css/
│   └── public.css          # Genel stil dosyası
│
├── includes/
│   ├── connection.php      # Veritabanı bağlantısı
│   ├── close_connection.php# Bağlantı kapatma
│   ├── header.php          # Üst kısım
│   ├── footer.php          # Alt kısım
│   └── function.php        # Yardımcı fonksiyonlar
│
├── index.php               # Ana sayfa
├── icerik.php              # İçerik görüntüleme
├── yonetim.php             # Yönetim paneli
├── giris.php               # Giriş sayfası
├── yeni_kullanici.php      # Kullanıcı kayıt
├── konu_ekle.php           # Yeni konu ekleme
├── konu_duzenle.php        # Konu düzenleme
└── konu_sil.php            # Konu silme
```

## Dosyaların Kısa Açıklamaları

- **connection.php** : Veritabanı bağlantısı
- **close_connection.php** : Veritabanı bağlantısını kapatır
- **header.php** : Sayfa üst kısmı
- **footer.php** : Sayfa alt kısmı
- **function.php** : Yardımcı fonksiyonlar
- **giris.php** : Kullanıcı giriş sayfası
- **index.php** : Ana sayfa
- **icerik.php** : İçerik görüntüleme
- **konu_ekle.php** : Yeni konu ekleme
- **konu_kaydet.php** : Konu kayıt işlemi
- **konu_duzenle.php** : Konu düzenleme
- **konu_sil.php** : Konu silme
- **yeni_kullanici.php** : Yeni kullanıcı ekleme
- **yonetim.php** : Yönetim paneli
- **public.css** : Genel stil dosyası

## Genel Çalışma Mantığı

- Veritabanı bağlantısı `connection.php` ile sağlanır
- Ortak alanlar `header.php` ve `footer.php` dosyalarından çağrılır
- Yönetim işlemleri yönetim paneli üzerinden yapılır
- İçerikler eklenebilir, düzenlenebilir ve silinebilir

## Kurulum

1. Dosyaları web sunucusuna kopyalayın
2. MySQL üzerinde bir veritabanı oluşturun
3. `includes/connection.php` dosyasında veritabanı bilgilerini girin
4. Tarayıcıdan `index.php` dosyasını açın

## Amaç

Bu proje:
- PHP öğrenenler
- Basit CMS yapısını anlamak isteyenler
- CRUD mantığını görmek isteyenler

için hazırlanmış örnek bir çalışmadır.

## Lisans

Eğitim amaçlıdır ve serbestçe kullanılabilir.
