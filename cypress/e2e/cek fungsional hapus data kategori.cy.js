describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.visit('http://127.0.0.1:8000/kategori')  
    })

    it('menambah data kategori baru yang belum dipakai oleh data buku agar tidak constraint key', () => { 
        cy.contains('Tambah').click()
        cy.get('input[name="id_kategori"]').type('AAA')
        cy.get('input[name="jenis_kategori"]').type('Testi')
        cy.get('form').submit()
    })

    it('menghapus data kategori', () => {
        cy.contains('AAA').parents('tr').find('.btn-danger').click()
    })
})