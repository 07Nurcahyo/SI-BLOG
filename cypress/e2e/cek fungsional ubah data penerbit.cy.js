describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.visit('http://127.0.0.1:8000/penerbit')   
    })

    it('mengubah semua informasi penerbit', () => {
        cy.get('input[name="id_penerbit"]').type('ANDEDIT')
        cy.get('input[name="nama_penerbit"]').type('Andi Edit')
        cy.get('form').submit()
    })

    it('mengubah salah satu informasi penerbit', () => {
        cy.contains('Edit').click()
        cy.get('input[name="id_penerbit"]').type('ANDEDIT2')
        cy.get('input[name="nama_penerbit"]')
        cy.get('form').submit()
    })

    it('jika tidak ada informasi yang dirubah', () => {
        cy.contains('Edit').click()
        cy.get('input[name="id_penerbit"]')
        cy.get('input[name="nama_penerbit"]')
        cy.get('form').submit()
    })
})