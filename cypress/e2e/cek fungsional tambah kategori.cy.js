describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.get('h1').should('have.text', 'Dashboard')
        cy.visit('http://127.0.0.1:8000/kategori')   
    })
  

    it('Masukkan semua informasi kategori', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="id_kategori"]').type('CBA')
        cy.get('input[name="jenis_kategori"]').type('Percobaan')
        cy.get('form').submit()
    })

    it('Masukkan salah satu informasi kategori', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="id_kategori"]').type('CBA')
        cy.get('input[name="jenis_kategori"]')
        cy.get('form').submit()
    })

    it('Informasi kategori kosong', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="id_kategori"]')
        cy.get('input[name="jenis_kategori"]')
        cy.get('form').submit()
    })
})