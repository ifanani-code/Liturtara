<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'Mengubah Tantangan Jadi Kesempatan: Jalan Keluar Untuk Bisnis Yang Mulai Stagnan',
            'image' => null,
            'date' => '2025-11-22',
            'content' => <<<TEXT
        Dalam ekosistem usaha kecil menengan (UKM) dan startup di Indonesia, muncul fenomena stagnansi bisnis atau kondisi di mana pertumbuhan berhenti atau menyusut yang disebabkan oleh terbatasnya inovasi, hambatan operasional, serta kurangnya pemanfaatan data dan juga pengetahuan praktis. Fenomena ini sangat relevan di era digital saat ini, di mana pelaku usaha dituntut untuk cepat beradaptasi dengan perubahan teknologi, pasar, dan model bisnis.  
  
        Beberapa temuan riset dan laporan terbaru di Indonesia menunjukkan:  
            a.	Menurut survei Kementerian Koperasi dan UKM Republik Indonesia (KUKM) tahun 2024, sekitar lebih dari 50% UKM menyatakan bahwa mereka mengalami ”pertumbuhan bisnis lambat” atau stagnan pada periode 2022-2023 karena terbatasnya akses ke pasar digital dan permodalan (data KUKM, 2024)  
            b.	Laporan Asosiasi Penyelenggara Jasa Internet Indonesia (APJII) menunjukkan bahwa meskipun penetrasi internet di Indonesia telah mencapai sekitar 77% (2023), hanya sekitar 34% UMKM yang memanfaatkan platform digital secara optimal. Hal ini menunjukkan gap antara akses teknologi dengan pemanfaatannya secara strategis.  
            c.	Riset akademik oleh Rina Sari & rekan (2023) menemukan bahwa dalam sampel UKM di Jakarta dan Jawa Barat, kurang dari 40% melakukan pembelajaran berkelanjutan (knowledge sharing) di dalam tim untuk meningkatkan respons terhadap tantangan pasar.  
            d.	Statistik dari Badan Pusat Statistik (BPS) menunjukkan bahwa tingkat turnover pegawai di sektor manufaktur ringan di Indonesia meningkat 2,4% tahun ke tahun (2023), dan salah satu faktor penyebab adalah stagnasi peluang pengembangan karir dan kurangnya budaya organisasi yang mendukung inovasi.  
  
        Faktor-Faktor Penyebab Stagnansi Bisnis
  
        Beberapa faktor kunci yang menjadi penyebab stagnansi bisnis menurut literatur dan data lapangan:  
  
            1. Keterbatasan Pengetahuan dan Sharing  
                Literatur menunjukkan bahwa budaya berbagi pengetahuan (knowledge sharing) secara informal atau formal berperan penting dalam inovasi dan kinerja organisasi. Misalnya, penelitian oleh Jamaludin Kurniawan et al. (2022) menunjukkan bahwa UKM yang menerapkan mekanisme sharing pengetahuan internal memiliki kemungkinan 1,6kali lebih besar untuk meluncurkan produk baru dalam 12 bulan dibanding yang tidak.  
            2. Rekrutmen dan Talenta yang Tidak Optimal  
                Keterbatasan dalam informal recruitment atau penggunaan talenta muda dengan mindset problem-solving dapat menghambat kapasitas adaptasi bisnis. Penelitian oleh Sri Hartati (2023) pada UKM di Jawa Timur menunjukkan bahwa hanya 22% dari mereka yang mempekerjakan lulusan baru atau mahasiswa magang yang memiliki tugas eksplisit dalam inovasi proses bisnis, tetapi seringkali kegiatan tersebut tidak ter-monitor dengan baik.  
            3. Budaya Organisasi dan Komitmen Organisasional Rendah  
                Menurut penelitian oleh Ahmad Dwi Santoso & rekan (2023), organisasi yang tingkat komitmen organisasionalnya rendah (nilai rata-rata <3 pada skala 5) cenderung memiliki indeks turnover intention yang lebih tinggi. Budaya yang tidak mengutamakan pembelajaran, kolaborasi antar-fungsi, atau feedback loop membuat bisnis “terkunci” dalam rutinitas yang sama.  
            4. Kurangnya Akses ke Kasus Nyata dan Solusi Praktis  
                Banyak UKM dan pemilik bisnis kecil menghadapi “masalah bisnis sehari-hari” seperti pemasaran digital, operasional produksi, pengembangan produk, maupun manajemen SDM, namun mereka sulit mendapatkan studi kasus praktis dan solusi langsung yang dapat diimplementasikan. Ini menjadi hambatan utama dalam melakukan perubahan atau skala bisnis.  
  
        Dengan menjawab kebutuhan bisnis dan talenta masa depan, Liturtara hadir sebagai platform yang mempertemukan pemilik bisnis dan para pemecah masalah. Pemilik bisnis dapat mengirimkan tantangan nyata sebagai case-owner, dan para pelajar, mahasiswa, maupun profesional dapat belajar sekaligus berkontribusi melalui real case-study. 
        TEXT
        ]);

        News::create([
            'title' => 'Meningkatkan Literasi untuk Memperkuat UMKM Indonesia: Kunci Menuju 2045',
            'image' => null,
            'date' => '2025-11-22',
            'content' => <<<TEXT
            Indonesia tengah menuju visi besar Indonesia Emas 2045, sebuah peta jalan untuk menjadi salah satu kekuatan ekonomi terbesar di dunia. Namun ada satu fakta penting, yaitu cita-cita ini tidak akan tercapai tanpa UMKM yang kuat, adaptif, dan kompetitif. Mengapa? Karena saat ini UMKM menyumbang lebih dari 61% PDB nasional dan menyerap 97% tenaga kerja di Indonesia (BPS, 2024). Artinya, kualitas UMKM mencerminkan kualitas ekonomi Indonesia.
            
            Tantangannya adalah banyak UMKM yang belum memiliki pemahaman dasar yang kuat terkait literasi digital, finansial, manajemen, dan inovasi. Akibatnya, pengetahuan yang mereka miliki belum bisa diterapkan menjadi keputusan bisnis yang tepat. Pada dasarnya, literasi bukan hanya soal membaca informasi, tetapi juga memahami, mengolah, dan menggunakannya untuk mengambil keputusan yang lebih cerdas dan sesuai dengan kebutuhan usaha.

            Mengapa Literasi Penting untuk Pertumbuhan UMKM?

            Literasi bagi UMKM mencakup empat aspek utama:
                •	Literasi Finansial (cashflow, pinjaman, budgeting)
                •	Literasi Digital (e-commerce, pemasaran digital, data insight)
                •	Literasi Manajerial & Bisnis (strategi, inovasi, tata kelola)
                •	Literasi Operasional (supply chain, produksi, layanan pelanggan)

            UMKM yang memiliki tingkat literasi tinggi terbukti:
                •	Lebih cepat beradaptasi dengan perubahan pasar
                •	Lebih mudah mengakses pembiayaan
                •	Lebih inovatif dalam pengembangan produk
                •	Lebih siap memasuki pasar ekspor

            Data terbaru menunjukkan progres positif, tetapi masih ada gap besar. Artinya, banyak UMKM yang sudah online, tetapi masih belum melek digital secara strategis.
                •	Tingkat literasi finansial nasional meningkat dari 49,68% (2022) menjadi 65,43% pada 2024 (SNLIK – OJK & BPS).
                •	Namun, hanya ±32% UMKM yang merasa mampu mengelola cashflow bisnis secara akurat (OJK, 2024).
                •	Data KemenKopUKM (2024) menunjukkan 70% UMKM mengalami kendala adaptasi digital, terutama dalam pemasaran online dan pemanfaatan teknologi.
                •	Deloitte Indonesia (2024) mencatat bahwa hanya 18–22% UMKM yang memanfaatkan data insight untuk pengambilan keputusan bisnis.
            
            Beberapa hambatan utama UMKM untuk bertransformasi dari bertahan menjadi tumbuh yang secara garis besar merupakan dampak dari rendahnya literasi:
                a.	Kesulitan mengakses pembiayaan, karena tidak paham administrasi keuangan atau skema pendanaan.
                b.	Inovasi berjalan lambat, karena tidak mengikuti tren pasar dan perubahan perilaku konsumen.
                c.	Tata kelola bisnis lemah, karena keputusan bisnis lebih banyak berdasar pada intuisi dibandingkan data atau strategi.
                d.	Sulit naik kelas, artinya usaha tetap berada pada level survival bukan scaling.
            
            Pada akhirnya, tantangan literasi yang masih dihadapi banyak UMKM hanya bisa teratasi jika pengetahuan tidak berhenti sebagai teori, tetapi diterapkan pada masalah nyata. Karena itu, Liturtara hadir sebagai platform yang mempertemukan pelaku usaha yang membutuhkan solusi dengan para pelajar, mahasiswa, dan profesional yang ingin belajar melalui kasus yang nyata. Dengan cara ini, literasi bukan hanya dipahami, tetapi digunakan untuk membantu UMKM berkembang dan bergerak maju.
        TEXT
        ]);

        News::create([
            'title' => 'Liturtara: Jembatan Antara Tantangan UMKM dan Solusi Berbasis Kolaborasi',
            'image' => null,
            'date' => '2025-11-22',
            'content' => <<<TEXT
            UMKM memegang peranan penting dalam perekonomian Indonesia. Hingga 2024, Indonesia memiliki lebih dari 65,5 juta pelaku UMKM yang berkontribusi terhadap 61,5% PDB nasional dan menyerap lebih dari 97% tenaga kerja di seluruh wilayah Indonesia (KemenKopUKM, 2024). Peran ini semakin strategis ketika kita berbicara mengenai visi Indonesia Emas 2045, di mana UMKM diharapkan menjadi salah satu motor penggerak daya saing bangsa.

            Namun, di balik kontribusi besarnya, masih banyak UMKM yang menghadapi tantangan mendasar dalam menjalankan usaha mereka. Data dari BRIN (2024) menunjukkan bahwa:
                •	68% UMKM masih bergantung pada intuisi daripada data dan analisis dalam pengambilan keputusan.
                •	Hanya 24% UMKM yang pernah mengikuti atau memiliki akses ke pendampingan bisnis terstruktur.
                •	Lebih dari 70% pelaku UMKM masih kesulitan dalam mengimplementasikan strategi digital, pemasaran, dan inovasi.
            
            Meskipun digitalisasi mulai meluas melalui marketplace, media sosial, dan sistem pembayaran digital, masih banyak UMKM belum memiliki strategi bisnis yang terukur. Mereka mungkin sudah go digital, tetapi belum go strategy.

            Kesenjangan Antara Tantangan Nyata Dan Akses Solusi

            Selama ini, banyak program pelatihan UMKM disampaikan melalui webinar atau modul yang cenderung umum dan kurang relevan dengan konteks operasional harian bisnis. Tantangan yang dialami pelaku usaha di lapangan sangat beragam dan spesifik, misalnya:
                •	“Iklan saya jalan setiap hari, tapi tidak ada yang checkout.”
                •	“Bagaimana cara menentukan harga supaya tetap kompetitif tetapi tidak rugi?”
                •	“Saya ingin scale-up produksi, tapi tidak tahu harus mulai dari mana.”
                •	“Saya butuh karyawan, tapi turnover selalu tinggi.”

            Di sisi lain, terdapat banyak mahasiswa, akademisi, dan profesional yang memiliki pengetahuan, analisis metodologis, serta kemampuan problem-solving. tetapi minim ruang untuk menerapkan ilmu tersebut pada masalah nyata. Sayangnya, kebutuhan yang saling melengkapi ini belum terhubung. Ini menjadi poin penting untuk jembatan kolaborasi.

            Liturtara: Ketika UMKM dan Talenta Bertemu Solusi

            Liturtara hadir untuk menjawab kesenjangan tersebut dengan membangun platform kolaboratif yang mempertemukan UMKM dengan mahasiswa, akademisi, dan profesional melalui pendekatan real case-study. Melalui mekanisme submit tantangan bisnis, UMKM tidak hanya belajar dari teori tetapi mendapatkan insight dan rekomendasi berbasis data, riset, dan pengalaman lintas disiplin. Sementara itu, para talenta yang terlibat dapat mengasah kemampuan mereka melalui pengalaman nyata sehingga pembelajaran tidak hanya informational, tetapi transformational.

            Peran Strategis Liturtara dalam Ekosistem Pengembangan UMKM

            1.  Akses ilmu berbasis pengalaman dan data, bukan hanya teori
                UMKM dapat belajar dari analisis para ahli maupun studi kasus yang relevan dengan tantangan mereka.
            2.  Laboratorium praktik bagi mahasiswa dan profesional
                Pengetahuan yang selama ini berada di ruang akademik dapat diterapkan langsung ke konteks bisnis nyata.
            3.  Ekosistem kolaborasi lintas sektor
                Platform ini menghubungkan UMKM, akademisi, mahasiswa, mentor, dan komunitas bisnis sehingga tercipta peluang networking, kemitraan, hingga pertumbuhan pasar.
            4.  Pendekatan pembelajaran berkelanjutan
                Dengan model berbasis studi kasus, UMKM dapat terus mengembangkan kompetensi sesuai fase bisnis mereka dan bukan sekadar satu kali pelatihan.
            
            Mengapa Model Ini Penting untuk Masa Depan UMKM Indonesia?

            Dengan perubahan pasar yang cepat, digitalisasi, dan dinamika konsumen, UMKM membutuhkan cara pembelajaran yang lebih adaptif, relevan, dan berbasis implementasi nyata.

            Metode learning by doing pada konteks bisnis dapat meningkatkan:
                •	kualitas pengambilan keputusan
                •	kemampuan inovasi
                •	kepercayaan diri dalam mengembangkan strategi
                •	potensi scaling usaha

            Seiring bertumbuhnya ekosistem digital pendidikan dan kolaborasi bisnis di Indonesia, model yang ditawarkan Liturtara dapat menjadi bagian dari solusi untuk mempercepat transformasi kesiapan UMKM. Mereka membutuhkan lebih dari sekadar teori untuk berkembang, tetapi juga membutuhkan ruang untuk bertanya, berlatih, berdiskusi, dan menemukan solusi yang relevan dengan tantangan yang mereka hadapi. Melalui Liturtara, pemilik UMKM dapat mengakses cara belajar yang lebih aplikatif, sementara mahasiswa dan profesional memiliki kesempatan memberikan dampak nyata melalui pemecahan real case-study. Dengan cara ini, pengetahuan tidak hanya dikonsumsi, tetapi dapat diimplementasikan untuk membantu bisnis Indonesia naik kelas. Karena di masa depan, pertumbuhan UMKM bukan hanya tentang bertahan, tetapi juga tentang bagaimana kita tumbuh bersama melalui kolaborasi.
        TEXT
        ]);
    }
}
