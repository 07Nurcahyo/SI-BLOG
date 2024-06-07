describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.visit('http://127.0.0.1:8000/lokasi')  
    })

    it('menambah data lokasi baru yang belum dipakai oleh data buku agar tidak constraint key', () => { 
        cy.contains('Tambah').click()
        cy.get('input[name="id_rak"]').clear().type('AAA')
        cy.get('input[name="nama_rak"]').clear().type('Testi')
        cy.get('input[name="nama_ruang"]').clear().type('Testi')
        cy.get('input[name="lantai"]').clear().type('2')
        cy.get('form').submit()
    })

    it('menghapus data lokasi', () => {
        cy.contains('AAA').parents('tr').find('.btn-danger').click()
    })
})