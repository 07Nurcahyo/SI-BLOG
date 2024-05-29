describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')     
    })
  

    it('Cari buku dengan judul', () => {
        cy.get('input[type="search"]').type('belajar')
        cy.get('.btn-primary').click()
    })

    it('Cari buku dengan penerbit', () => {
        cy.get('input[type="search"]').type('andi')
        cy.get('.btn-primary').click()
    })

    it('Cari buku dengan kategori', () => {
        cy.get('input[type="search"]').type('pemrograman')
        cy.get('.btn-primary').click()
    })

    it('Cari buku dengan tahun terbit', () => {
        cy.get('input[type="search"]').type('2010')
        cy.get('.btn-primary').click()
    })
  })
  