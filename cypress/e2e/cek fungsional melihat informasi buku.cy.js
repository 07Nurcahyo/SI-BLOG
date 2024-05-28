describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/') 
        cy.visit('/listbook')    
    })
  

    it('Klik gambar buku', () => {
        cy.get('[alt="white sample"]').first().click()
        // cy.contains('Tutup').click()
    })
  })
  