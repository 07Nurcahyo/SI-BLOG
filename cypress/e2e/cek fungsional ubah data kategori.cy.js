describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.visit('http://127.0.0.1:8000/kategori')
    })

    it('menambah data penerbit baru yang belum dipakai oleh data buku agar tidak constraint key', () => { 
        cy.contains('Tambah').click()
        cy.get('input[name="id_kategori"]').type('AAA')
        cy.get('input[name="jenis_kategori"]').type('Testi')
        cy.get('form').submit()
    })

    it('mengubah semua informasi kategori', () => {
        cy.contains('AAA').parents('tr').then(row => {
            const id_penerbit = row.find(':nth-child(2)').text()
            const nama_penerbit = row.find(':nth-child(3)').text()

            cy.wrap(row).find('.btn-warning').click()
            cy.get('input[name="id_kategori"]').clear().type('AAATES')
            cy.get('input[name="jenis_kategori"]').clear().type('TestiUbah')
            cy.get('form').submit()
        })
    })

    it('mengubah salah satu informasi kategori', () => {
        cy.contains('AAA').parents('tr').then(row => {
            const id_penerbit = row.find(':nth-child(2)').text()
            const nama_penerbit = row.find(':nth-child(3)').text()

            cy.wrap(row).find('.btn-warning').click()
            cy.get('input[name="id_kategori"]').clear().type('AAATSS')
            cy.get('input[name="jenis_kategori"]')
            cy.get('form').submit()
        })
    })

    it('tidak mengubah informasi kategori', () => {
        cy.contains('AAA').parents('tr').then(row => {
            const id_penerbit = row.find(':nth-child(2)').text()
            const nama_penerbit = row.find(':nth-child(3)').text()

            cy.wrap(row).find('.btn-warning').click()
            cy.get('input[name="id_kategori"]')
            cy.get('input[name="jenis_kategori"]')
            cy.get('form').submit()
        })
    })
})