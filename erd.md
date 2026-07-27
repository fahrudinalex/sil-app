# Entity Relationship Diagram - SIMBANSOS

Berikut adalah diagram relasi entitas (ERD) yang lebih mendetail berdasarkan migration yang telah dibuat, lengkap dengan tipe data dan struktur relasinya.

```mermaid
erDiagram
    users {
        id bigint PK
        name string
        email string
        password string
        role enum
        phone string
        created_at timestamp
        updated_at timestamp
    }
    
    item_categories {
        id bigint PK
        name string
        description text
        created_at timestamp
        updated_at timestamp
    }
    
    items {
        id bigint PK
        item_category_id bigint FK
        name string
        unit string
        description text
        created_at timestamp
        updated_at timestamp
    }
    
    warehouses {
        id bigint PK
        name string
        address text
        created_at timestamp
        updated_at timestamp
    }
    
    item_variants {
        id bigint PK
        item_id bigint FK
        warehouse_id bigint FK
        variant_name string
        stock_quantity int
        minimum_stock int
        expired_at date
        created_at timestamp
        updated_at timestamp
    }
    
    stock_movements {
        id bigint PK
        item_variant_id bigint FK
        user_id bigint FK
        type enum
        quantity int
        reference_type string
        reference_id bigint
        notes text
        moved_at datetime
        created_at timestamp
        updated_at timestamp
    }
    
    disasters {
        id bigint PK
        name string
        type string
        location_name string
        address text
        latitude decimal
        longitude decimal
        occurred_at date
        description text
        status enum
        created_at timestamp
        updated_at timestamp
    }
    
    distributions {
        id bigint PK
        disaster_id bigint FK
        user_id bigint FK
        distribution_code string
        distributed_at datetime
        status enum
        notes text
        created_at timestamp
        updated_at timestamp
    }
    
    distribution_items {
        id bigint PK
        distribution_id bigint FK
        item_variant_id bigint FK
        quantity int
        created_at timestamp
        updated_at timestamp
    }
    
    distribution_photos {
        id bigint PK
        distribution_id bigint FK
        photo_path string
        caption string
        created_at timestamp
        updated_at timestamp
    }

    %% Relationships
    users ||--o{ stock_movements : "records"
    users ||--o{ distributions : "handles"
    item_categories ||--o{ items : "has many"
    items ||--o{ item_variants : "has many"
    warehouses ||--o{ item_variants : "stores"
    item_variants ||--o{ stock_movements : "tracked in"
    item_variants ||--o{ distribution_items : "distributed as"
    disasters ||--o{ distributions : "receives"
    distributions ||--o{ distribution_items : "contains"
    distributions ||--o{ distribution_photos : "documented by"
```

## Penjelasan Relasi
1. **users** mencatat banyak **stock_movements** (Admin yang melakukan input stok).
2. **users** menangani banyak **distributions** (Petugas Lapangan yang mendistribusikan barang).
3. **item_categories** memiliki banyak **items** (Setiap barang masuk ke dalam satu kategori, misal: Makanan -> Indomie).
4. **items** memiliki banyak **item_variants** (Setiap barang bisa memiliki banyak varian, misal: Indomie Goreng, Indomie Kuah).
5. **warehouses** menyimpan banyak **item_variants** (Setiap varian barang disimpan di sebuah gudang).
6. **item_variants** dicatat dalam banyak **stock_movements** (Mutasi stok masuk atau keluar dari sebuah varian barang).
7. **item_variants** didistribusikan dalam bentuk banyak **distribution_items** (Varian barang mana saja yang didistribusikan).
8. **disasters** menerima banyak **distributions** (Sebuah lokasi bencana bisa mendapatkan beberapa kali distribusi bantuan).
9. **distributions** berisi banyak **distribution_items** (Dalam sekali distribusi, bisa memuat banyak varian barang).
10. **distributions** didokumentasikan oleh banyak **distribution_photos** (Satu kali distribusi bisa memiliki banyak foto bukti lapangan).
