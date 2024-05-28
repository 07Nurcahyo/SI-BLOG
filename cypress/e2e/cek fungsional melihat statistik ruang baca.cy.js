describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')     
    })
  

    it('Pilih menu statistik', () => {
        cy.visit('/guest/statistik')
    })
  })
  