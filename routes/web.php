<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('/master-data/units', UnitController::class)
        ->parameters(['units' => 'unit'])
        ->names([
            'index' => 'erp.units',
            'create' => 'erp.units.create',
            'store' => 'erp.units.store',
            'show' => 'erp.units.show',
            'edit' => 'erp.units.edit',
            'update' => 'erp.units.update',
            'destroy' => 'erp.units.destroy',
        ]);

    $erpPages = [
        [
            'uri' => '/master-data/properties',
            'name' => 'erp.properties',
            'module' => 'Master Data',
            'title' => 'Properties / Perumahan',
            'description' => 'Daftar project perumahan, lokasi, tipe cluster, dan status pengembangan.',
            'stats' => ['Active Projects' => '8', 'Open Blocks' => '24', 'Total Units' => '128'],
            'rows' => [
                ['Emerald Residence', 'Bekasi', 'Active', '64 units'],
                ['Green Valley', 'Bogor', 'Planning', '42 units'],
                ['Sakura Hills', 'Tangerang', 'Active', '22 units'],
            ],
        ],
        [
            'uri' => '/master-data/blocks',
            'name' => 'erp.blocks',
            'module' => 'Master Data',
            'title' => 'Blocks',
            'description' => 'Pengelompokan blok perumahan untuk monitoring ketersediaan unit.',
            'stats' => ['Blocks' => '24', 'Available' => '11', 'Sold Out' => '4'],
            'rows' => [
                ['Cluster A', 'Emerald Residence', 'Available', '18 units'],
                ['Cluster B', 'Emerald Residence', 'Limited', '12 units'],
                ['Cluster Sakura', 'Sakura Hills', 'Available', '22 units'],
            ],
        ],
       
        [
            'uri' => '/master-data/customers',
            'name' => 'erp.customers',
            'module' => 'Master Data',
            'title' => 'Customers',
            'description' => 'Data konsumen, kontak, sumber lead, dan histori transaksi unit.',
            'stats' => ['Customers' => '342', 'New This Month' => '18', 'Active Deals' => '41'],
            'rows' => [
                ['Budi Santoso', 'Lead Website', 'Prospect', 'C-0210'],
                ['Rina Wijaya', 'Referral', 'Booked', 'A-012'],
                ['Andi Pratama', 'Walk-in', 'Contract', 'B-0807'],
            ],
        ],
        [
            'uri' => '/sales-crm/leads',
            'name' => 'erp.leads',
            'module' => 'Sales CRM',
            'title' => 'Leads',
            'description' => 'Monitoring calon konsumen dari iklan, referral, website, dan walk-in.',
            'stats' => ['Open Leads' => '56', 'Hot Leads' => '14', 'Conversion' => '22%'],
            'rows' => [
                ['Budi Santoso', 'Hot', 'Website', 'Follow up hari ini'],
                ['Siti Aminah', 'Warm', 'Instagram Ads', 'Survey lokasi'],
                ['Hendra Putra', 'Cold', 'Referral', 'Butuh reminder'],
            ],
        ],
        [
            'uri' => '/sales-crm/bookings',
            'name' => 'erp.bookings',
            'module' => 'Sales CRM',
            'title' => 'Bookings',
            'description' => 'Data booking unit, booking fee, status validasi, dan sales owner.',
            'stats' => ['Bookings' => '36', 'Pending Validation' => '5', 'Cancelled' => '2'],
            'rows' => [
                ['BK-2406-001', 'A-012', 'Validated', 'Rina Wijaya'],
                ['BK-2406-002', 'C-0210', 'Pending', 'Budi Santoso'],
                ['BK-2406-003', 'A-018', 'Draft', 'Siti Aminah'],
            ],
        ],
        [
            'uri' => '/sales-crm/pipeline',
            'name' => 'erp.sales-pipeline',
            'module' => 'Sales CRM',
            'title' => 'Sales Pipeline',
            'description' => 'Ringkasan progres lead dari prospect sampai contract signed.',
            'stats' => ['Prospect' => '56', 'Booking' => '36', 'Contract' => '21'],
            'rows' => [
                ['Prospect', '56 leads', 'Rp 28,4 M', '22% conversion'],
                ['Booking', '36 deals', 'Rp 18,7 M', '58% paid fee'],
                ['Contract', '21 deals', 'Rp 12,2 M', 'Ready invoice'],
            ],
        ],
        [
            'uri' => '/finance/invoices',
            'name' => 'erp.invoices',
            'module' => 'Finance',
            'title' => 'Invoices',
            'description' => 'Tagihan booking, cicilan, pelunasan, dan denda keterlambatan.',
            'stats' => ['Outstanding' => 'Rp 82,5 jt', 'Due This Week' => '18', 'Paid Ratio' => '74%'],
            'rows' => [
                ['INV-2406-001', 'B-0807', 'Overdue', 'Rp 12,5 jt'],
                ['INV-2406-002', 'A-012', 'Due Soon', 'Rp 8,0 jt'],
                ['INV-2406-003', 'C-0210', 'Paid', 'Rp 15,0 jt'],
            ],
        ],
        [
            'uri' => '/finance/payments',
            'name' => 'erp.payments',
            'module' => 'Finance',
            'title' => 'Payments',
            'description' => 'Pencatatan pembayaran konsumen dan rekonsiliasi kas/bank.',
            'stats' => ['Payments' => 'Rp 436 jt', 'Bank Transfer' => '82%', 'Cash' => '18%'],
            'rows' => [
                ['PAY-2406-001', 'INV-2406-003', 'Verified', 'Rp 15,0 jt'],
                ['PAY-2406-002', 'INV-2406-004', 'Waiting Review', 'Rp 7,5 jt'],
                ['PAY-2406-003', 'INV-2406-005', 'Verified', 'Rp 20,0 jt'],
            ],
        ],
        [
            'uri' => '/finance/cashier',
            'name' => 'erp.cashier',
            'module' => 'Finance',
            'title' => 'Cashier',
            'description' => 'Input penerimaan harian, validasi bukti bayar, dan closing kasir.',
            'stats' => ['Today Receipt' => 'Rp 31 jt', 'Pending Review' => '7', 'Closed Batch' => '4'],
            'rows' => [
                ['Batch 001', 'Open', 'Kasir 1', 'Rp 11,5 jt'],
                ['Batch 002', 'Closed', 'Kasir 2', 'Rp 8,2 jt'],
                ['Batch 003', 'Review', 'Kasir 1', 'Rp 11,3 jt'],
            ],
        ],
        [
            'uri' => '/operations/contracts',
            'name' => 'erp.contracts',
            'module' => 'Operations',
            'title' => 'Contracts',
            'description' => 'Monitoring kontrak penjualan/sewa dari draft sampai signed.',
            'stats' => ['Contracts' => '21', 'Draft' => '6', 'Signed' => '15'],
            'rows' => [
                ['CTR-2406-001', 'A-012', 'Signed', 'Rina Wijaya'],
                ['CTR-2406-002', 'C-0210', 'Draft', 'Budi Santoso'],
                ['CTR-2406-003', 'B-0807', 'Legal Review', 'Andi Pratama'],
            ],
        ],
        [
            'uri' => '/operations/ppjb-bast',
            'name' => 'erp.ppjb-bast',
            'module' => 'Operations',
            'title' => 'PPJB / BAST',
            'description' => 'Alur dokumen PPJB sampai berita acara serah terima unit.',
            'stats' => ['PPJB Ready' => '12', 'BAST Scheduled' => '8', 'Completed' => '27'],
            'rows' => [
                ['PPJB-001', 'A-012', 'Ready Sign', '25 Jun'],
                ['BAST-008', 'B-0807', 'Scheduled', '27 Jun'],
                ['PPJB-002', 'C-0210', 'Waiting Payment', 'TBD'],
            ],
        ],
        [
            'uri' => '/operations/maintenance',
            'name' => 'erp.maintenance',
            'module' => 'Operations',
            'title' => 'Maintenance',
            'description' => 'Tiket komplain unit, SLA pekerjaan, dan status penyelesaian teknisi.',
            'stats' => ['Open Tickets' => '17', 'On Progress' => '9', 'Closed' => '42'],
            'rows' => [
                ['MT-001', 'B-0807', 'On Progress', 'Plumbing'],
                ['MT-002', 'A-012', 'Open', 'Electrical'],
                ['MT-003', 'C-0210', 'Closed', 'Finishing'],
            ],
        ],
        [
            'uri' => '/documents/kpr-tracking',
            'name' => 'erp.kpr-tracking',
            'module' => 'Documents',
            'title' => 'KPR Tracking',
            'description' => 'Monitoring dokumen KPR dari collect berkas sampai approval bank.',
            'stats' => ['Applications' => '29', 'Bank Review' => '13', 'Approved' => '9'],
            'rows' => [
                ['KPR-001', 'Budi Santoso', 'Bank Review', 'BCA'],
                ['KPR-002', 'Rina Wijaya', 'Approved', 'Mandiri'],
                ['KPR-003', 'Siti Aminah', 'Collect Docs', 'BTN'],
            ],
        ],
        [
            'uri' => '/documents/certificate-tracking',
            'name' => 'erp.certificate-tracking',
            'module' => 'Documents',
            'title' => 'Certificate Tracking',
            'description' => 'Tracking sertifikat, pecah sertifikat, AJB, dan status pengambilan.',
            'stats' => ['Certificates' => '48', 'In Process' => '19', 'Ready' => '11'],
            'rows' => [
                ['SHM-001', 'A-012', 'In Process', 'Notaris A'],
                ['SHM-002', 'B-0807', 'Ready', 'Legal Team'],
                ['SHM-003', 'C-0210', 'Waiting AJB', 'Notaris B'],
            ],
        ],
        [
            'uri' => '/documents/handover',
            'name' => 'erp.handover',
            'module' => 'Documents',
            'title' => 'Handover Documents',
            'description' => 'Serah terima dokumen ke konsumen, checklist, dan arsip digital.',
            'stats' => ['Ready Handover' => '10', 'Pending Docs' => '6', 'Completed' => '31'],
            'rows' => [
                ['DOC-001', 'B-0807', 'Ready', 'BAST + Keys'],
                ['DOC-002', 'A-012', 'Pending', 'Invoice Final'],
                ['DOC-003', 'C-0210', 'Completed', 'Archive'],
            ],
        ],
        [
            'uri' => '/reports/sales',
            'name' => 'erp.sales-report',
            'module' => 'Reports',
            'title' => 'Sales Report',
            'description' => 'Ringkasan penjualan per project, sales, sumber lead, dan periode.',
            'stats' => ['Sales MTD' => 'Rp 12,2 M', 'Deals' => '21', 'Growth' => '+18%'],
            'rows' => [
                ['Emerald Residence', 'Rp 7,4 M', '12 deals', '+14%'],
                ['Green Valley', 'Rp 2,8 M', '5 deals', '+8%'],
                ['Sakura Hills', 'Rp 2,0 M', '4 deals', '+21%'],
            ],
        ],
        [
            'uri' => '/reports/finance',
            'name' => 'erp.finance-report',
            'module' => 'Reports',
            'title' => 'Finance Report',
            'description' => 'Laporan invoice, pembayaran, aging piutang, dan penerimaan kas.',
            'stats' => ['Revenue MTD' => 'Rp 436 jt', 'Outstanding' => 'Rp 82,5 jt', 'Collection' => '74%'],
            'rows' => [
                ['Invoice Paid', 'Rp 353,5 jt', '74%', 'Good'],
                ['Invoice Due', 'Rp 58,0 jt', '18 invoice', 'Watch'],
                ['Overdue', 'Rp 24,5 jt', '7 invoice', 'Action'],
            ],
        ],
        [
            'uri' => '/reports/occupancy',
            'name' => 'erp.occupancy-report',
            'module' => 'Reports',
            'title' => 'Occupancy Report',
            'description' => 'Laporan okupansi unit, status available, booked, occupied, dan maintenance.',
            'stats' => ['Occupancy' => '87%', 'Available' => '47', 'Maintenance' => '8'],
            'rows' => [
                ['Available', '47 units', '36%', 'Ready sell'],
                ['Booked', '36 units', '28%', 'Follow finance'],
                ['Occupied', '37 units', '29%', 'Active'],
            ],
        ],
        [
            'uri' => '/settings/company-profile',
            'name' => 'erp.company-profile',
            'module' => 'Settings',
            'title' => 'Company Profile',
            'description' => 'Profil perusahaan, brand, alamat kantor, dan konfigurasi demo.',
            'stats' => ['Company' => '1', 'Branches' => '3', 'Active Users' => '12'],
            'rows' => [
                ['PT Demo Property ERP', 'Head Office', 'Active', 'Jakarta'],
                ['Sales Office Bekasi', 'Branch', 'Active', 'Bekasi'],
                ['Legal Archive', 'Department', 'Active', 'Jakarta'],
            ],
        ],
    ];

    foreach ($erpPages as $page) {
        Route::view($page['uri'], 'erp.placeholder', $page)->name($page['name']);
    }

    // Existing Soft UI pages kept for compatibility while the ERP demo grows.
    Route::view('/billing', 'billing')->name('billing');
    Route::view('/profile', 'profile')->name('profile');
    Route::view('/rtl', 'rtl')->name('rtl');
    Route::view('/tables', 'tables')->name('tables');
    Route::view('/virtual-reality', 'virtual-reality')->name('virtual-reality');
    Route::view('/user-management', 'laravel-examples/user-management')->name('user-management');

    Route::get('/user-profile', [InfoUserController::class, 'create'])->name('user-profile');
    Route::post('/user-profile', [InfoUserController::class, 'store'])->name('user-profile.store');

    Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/session', [SessionsController::class, 'store'])->name('session.store');

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login/forgot-password', [ResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ResetController::class, 'sendEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});
