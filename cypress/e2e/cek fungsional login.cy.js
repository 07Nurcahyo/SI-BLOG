describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/login_admin')     
    })
  

    it('Masukkan username dan password valid', () => {
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.get('h1').should('have.text', 'Dashboard')
        cy.visit('logout')
    })

    it('Masukkan username tidak valid dan password valid', () => {
        cy.get('input[name="username"]').type('fafifu')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        // cy.get('.alert alert-warning alert-dismissible fade show').should('have.text', 'Opps!')
        cy.on('window:alert', (str) => {
            expect(str).to.equal('Pastikan kembali username dan password yang dimasukkan sudah benar')
        })
    })

    it('Masukkan username valid dan password tidak valid', () => {
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('wasweswos')
        cy.get('form').submit()
        cy.on('window:alert', (str) => {
            expect(str).to.equal('Pastikan kembali username dan password yang dimasukkan sudah benar')
        })
    })

    it('Masukkan username dan password tidak valid', () => {
        cy.get('input[name="username"]').type('fafifu')
        cy.get('input[name="password"]').type('wasweswos')
        cy.get('form').submit()
        cy.on('window:alert', (str) => {
            expect(str).to.equal('Pastikan kembali username dan password yang dimasukkan sudah benar')
        })
    })

    it('username dan password kosong', () => {
        cy.get('input[name="username"]')
        cy.get('input[name="password"]')
        cy.get('form').submit()
        cy.on('window:alert', (str) => {
            expect(str).to.equal('Pastikan kembali username dan password yang dimasukkan sudah benar')
        })
    })
  })
  