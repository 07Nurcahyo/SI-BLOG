describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/admin')     
    })
  

    it('Masukkan semua informasi buku', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="isbn"]').type('978-999-6679-67-0')
        cy.get('input[name="judul_buku"]').type('Pemrograman Terstruktur')
        cy.get('input[name="tahun_terbit"]').type('2020')
        cy.get('#id_penerbit').select('ANDI')
        cy.get('#id_kategori').select('Pemrograman')
        cy.get('input[name="penulis"]').type('Rahma Dian')
        cy.get('#id_rak').select('Rak 2')
        cy.get('input[name="stok"]').type('2')
        cy.get('form').submit()
    })

    it('Informasi buku yang diwajibkan tidak diisi', () => {
        cy.contains('Tambah').click()
        // cy.get('input[name="isbn"]').type('978-999-6679-67-0')
        cy.get('input[name="judul_buku"]').type('Pemrograman Terstruktur')
        cy.get('input[name="tahun_terbit"]').type('2020')
        cy.get('#id_penerbit').select('ANDI')
        cy.get('#id_kategori').select('Pemrograman')
        cy.get('input[name="penulis"]').type('Rahma Dian')
        cy.get('#id_rak').select('Rak 2')
        cy.get('input[name="stok"]').type('2')
        cy.get('form').submit()
    })
  })
  