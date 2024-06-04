describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.visit('http://127.0.0.1:8000/lokasi')   
    })
  

    it('Masukkan semua informasi lokasi', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="id_rak"]').type('CBA')
        cy.get('input[name="nama_rak"]').type('Percobaan')
        cy.get('input[name="nama_ruang"]').type('Percobaan')
        cy.get('input[name="lantai"]').type('Percobaan')
        cy.get('form').submit()
    })

    it('Masukkan salah satu informasi lokasi', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="nama_rak"]').type('Percobaan')
        cy.get('input[name="nama_ruang"]').type('Percobaan')
        cy.get('input[name="lantai"]').type('Percobaan')
        cy.get('form').submit()
    })

    it('Informasi lokasi kosong', () => {
        cy.contains('Tambah').click()
        cy.get('input[name="id_rak"]')
        cy.get('input[name="nama_rak"]')
        cy.get('input[name="nama_ruang"]')
        cy.get('input[name="lantai"]')
        cy.get('form').submit()
    })
})