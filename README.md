# Mystery Case

## Deskripsi Project

Mystery Case adalah website sederhana yang menampilkan informasi mengenai kasus misteri, tersangka, serta hubungan antara kasus dan tersangka.

Website ini dibuat sebagai project database dan PHP dengan menggunakan MySQL.

## Tujuan

Project ini dibuat untuk menerapkan penggunaan database yang memiliki beberapa tabel dan relasi, kemudian menampilkan data tersebut melalui website menggunakan PHP.

## Entitas dan Atribut

### 1. Cases

Tabel `cases` digunakan untuk menyimpan informasi mengenai kasus misteri.

Atribut:
- `id_case` sebagai Primary Key
- `case_name` sebagai nama kasus
- `location` sebagai lokasi kejadian
- `case_date` sebagai tanggal kasus
- `status` sebagai status kasus
- `description` sebagai deskripsi kasus

### 2. Suspects

Tabel `suspects` digunakan untuk menyimpan informasi mengenai tersangka atau orang yang berhubungan dengan kasus.

Atribut:
- `id_suspect` sebagai Primary Key
- `suspect_name` sebagai nama tersangka
- `age` sebagai umur
- `occupation` sebagai pekerjaan
- `address` sebagai alamat
- `status` sebagai status tersangka

### 3. Case Suspects

Tabel `case_suspects` digunakan untuk menghubungkan tabel `cases` dengan tabel `suspects`.

Atribut:
- `id_case_suspect` sebagai Primary Key
- `id_case` sebagai Foreign Key dari tabel `cases`
- `id_suspect` sebagai Foreign Key dari tabel `suspects`
- `role` sebagai peran seseorang dalam kasus
- `evidence` sebagai bukti yang berkaitan dengan orang tersebut

## Relasi Antar Tabel

Tabel `cases` memiliki relasi dengan tabel `case_suspects`.

Satu kasus dapat memiliki banyak tersangka atau orang yang terlibat.

Relasinya adalah:

`cases` → `case_suspects`

Sementara itu, tabel `suspects` juga berhubungan dengan tabel `case_suspects`.

Relasinya adalah:

`suspects` → `case_suspects`

Dengan demikian, tabel `case_suspects` menjadi tabel penghubung antara kasus dan tersangka.

## Kardinalitas

Relasi antara `cases` dan `case_suspects` adalah:

**1 : Many**

Artinya satu kasus dapat memiliki banyak data pada tabel `case_suspects`.

Relasi antara `suspects` dan `case_suspects` juga:

**1 : Many**

Artinya satu tersangka dapat muncul pada lebih dari satu kasus.

## Teknologi yang Digunakan

- HTML
- CSS
- PHP
- MySQL
- DBeaver
- Laragon

## Struktur Project

```text
mystery-case/
├── database/
│   └── schema.sql
├── services/
│   └── config.php
├── index.php
├── style.css
└── README.md