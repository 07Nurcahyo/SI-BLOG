describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.visit('http://127.0.0.1:8000/penerbit')   
    })
  

    it('Masukkan semua informasi penerbit', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="id_penerbit"]').type('CBA')
        cy.get('input[name="nama_penerbit"]').type('Percobaan')
        cy.get('form').submit()
    })

    it('Masukkan salah satu informasi penerbit', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="id_penerbit"]').type('CBA')
        cy.get('input[name="nama_penerbit"]')
        cy.get('form').submit()
    })

    it('Informasi penerbit kosong', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="id_penerbit"]')
        cy.get('input[name="nama_penerbit"]')
        cy.get('form').submit()
    })
})