describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/login_admin')     
    })
  

    it('Masukkan username dan password valid', () => {
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.get('h1').should('have.text', 'Dashboard')
        cy.visit('/actionlogout')
    })

    it('Masukkan username tidak valid dan password valid', () => {
        cy.get('input[name="username"]').type('fafifu')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.get('h1').should('have.text', 'Dashboard')
        cy.visit('/actionlogout')
    })

    it('Masukkan username valid dan password tidak valid', () => {
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('wasweswos')
        cy.get('form').submit()
        cy.get('h1').should('have.text', 'Dashboard')
        cy.visit('/actionlogout')
    })

    it('Masukkan username dan password tidak valid', () => {
        cy.get('input[name="username"]').type('fafifu')
        cy.get('input[name="password"]').type('wasweswos')
        cy.get('form').submit()
        cy.get('h1').should('have.text', 'Dashboard')
        cy.visit('/actionlogout')
    })

    it('username dan password kosong', () => {
        cy.get('input[name="username"]').type('')
        cy.get('input[name="password"]').type('')
        cy.get('form').submit()
        cy.get('h1').should('have.text', 'Dashboard')
        cy.visit('/actionlogout')
    })
  })
  