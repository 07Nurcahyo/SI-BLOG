describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/listbook')    
    })
  

    it('Cari buku dengan filter kategori', () => {
        cy.get('#id_kategori').click()
        cy.contains('Ilmu Informasi').get('#id_kategori').should('have.text', 'Ilmu Informasi')
    })

    // it('Cari buku dengan filter tahun terbit', () => {
    //     cy.contains('Tahun Terbit').click()
    //     cy.contains('2010').click()
    // })

    // it('Cari buku dengan filter penerbit', () => {
    //     cy.contains('Penerbit').click()
    //     cy.contains('andi').click()
    // })
  })
  