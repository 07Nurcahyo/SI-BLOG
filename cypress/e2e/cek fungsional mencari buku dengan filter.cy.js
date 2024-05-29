describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/listbook')    
    })
  

    it('Cari buku dengan filter kategori', () => {
        cy.contains('Kategori').click()
        cy.get('.nav-item').contains('Ilmu Informasi').click({force:true})
        // cy.url().should('include', '#ilmuinformasi')

    })

    it('Cari buku dengan filter tahun terbit', () => {
        cy.contains('Tahun Terbit').click()
        cy.get('.nav-item').contains('2010').click({force:true})
    })

    it('Cari buku dengan filter penerbit', () => {
        cy.contains('Penerbit').click()
        cy.get('.nav-item').contains('ANDI').click({force:true})
    })
  })
  