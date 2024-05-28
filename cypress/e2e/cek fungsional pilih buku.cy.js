describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')     
    })
  

    it('Pilih menu Lihat Semua Buku', () => {
        cy.visit('/listbook')
    })
  })
  