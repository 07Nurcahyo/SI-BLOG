describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.get('h1').should('have.text', 'Dashboard')
        cy.visit('http://127.0.0.1:8000/admin')   
    })
  

    // it('Ubah salah satu informasi buku', () => {
    //     cy.get('.btn-warning').first().click()
    //     cy.get('input[name="isbn"]').clear().type('978-189-8734-90-5')
    //     cy.get('form').submit()
    // })

    // it('Ubah seluruh informasi buku', () => {
    //     cy.get('.btn-warning').first().click()
    //     cy.get('input[name="isbn"]').clear().type('978-189-8734-90-5')
    //     cy.get('input[name="judul_buku"]').clear().type('Pemrograman Terstruktur')
    //     cy.get('input[name="tahun_terbit"]').clear().type('2020')
    //     cy.get('#id_penerbit').select('ANDI')
    //     cy.get('#id_kategori').select('Pemrograman')
    //     cy.get('input[name="penulis"]').clear().type('Rahma Dian')
    //     cy.get('#id_rak').select('Rak 2')
    //     cy.get('input[name="stok"]').clear().type('2')
    //     cy.get('form').submit()
    // })

    it('Kosongi seluruh informasi buku', () => {
        cy.get('.btn-warning').first().click()
        cy.get('input[name="isbn"]').clear()
        cy.get('input[name="judul_buku"]').clear()
        cy.get('input[name="tahun_terbit"]').clear()
        cy.get('#id_penerbit').select('INB')
        cy.get('#id_kategori').select('')
        cy.get('input[name="penulis"]').clear()
        cy.get('#id_rak').select('')
        cy.get('input[name="stok"]').clear()
        cy.get('form').submit()
    })
  })
  