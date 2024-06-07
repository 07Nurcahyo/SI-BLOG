describe('SI-BLOG tests', () => {
    beforeEach(() => {
        cy.visit('http://127.0.0.1:8000/')
        cy.visit('http://127.0.0.1:8000/login_admin')
        cy.get('input[name="username"]').type('admin')
        cy.get('input[name="password"]').type('root')
        cy.get('form').submit()
        cy.visit('http://127.0.0.1:8000/lokasi')
    })

    it('menambah data lokasi baru yang belum dipakai oleh data buku agar tidak constraint key', () => { 
        cy.contains('Tambah').click()
        cy.get('input[name="id_rak"]').type('AAA')
        cy.get('input[name="nama_rak"]').type('Testi')
        cy.get('input[name="nama_ruang"]').type('Testi')
        cy.get('input[name="lantai"]').type('1')
        cy.get('form').submit()
    })

    it('mengubah semua informasi lokasi', () => {
        cy.contains('AAA').parents('tr').then(row => {
            const id_rak = row.find(':nth-child(2)').text()
            const nama_rak = row.find(':nth-child(3)').text()
            const nama_ruang = row.find(':nth-child(4)').text()
            const lantai = row.find(':nth-child(5)').text()
            cy.wrap(row).find('.btn-warning').click()
            cy.get('input[name="id_rak"]').clear().type('AAATES')
            cy.get('input[name="nama_rak"]').clear().type('TestiUbah')
            cy.get('input[name="nama_ruang"]').clear().type('TestiUbah')
            cy.get('input[name="lantai"]').clear().type('2')
            cy.get('form').submit()
        })
    })

    it('mengubah salah satu informasi lokasi', () => {
        cy.contains('AAA').parents('tr').then(row => {
            const id_rak = row.find(':nth-child(2)').text()
            const nama_rak = row.find(':nth-child(3)').text()
            const nama_ruang = row.find(':nth-child(4)').text()
            const lantai = row.find(':nth-child(5)').text()
            cy.wrap(row).find('.btn-warning').click()
            cy.get('input[name="id_rak"]').clear().type('AAATES2')
            cy.get('input[name="nama_rak"]')
            cy.get('input[name="nama_ruang"]')
            cy.get('input[name="lantai"]')
            cy.get('form').submit()
        })
    })

    it('tidak mengubah informasi lokasi', () => {
        cy.contains('AAA').parents('tr').then(row => {
            const id_rak = row.find(':nth-child(2)').text()
            const nama_rak = row.find(':nth-child(3)').text()
            const nama_ruang = row.find(':nth-child(4)').text()
            const lantai = row.find(':nth-child(5)').text()
            cy.wrap(row).find('.btn-warning').click()
            cy.get('input[name="id_rak"]')
            cy.get('input[name="nama_rak"]')
            cy.get('input[name="nama_ruang"]')
            cy.get('input[name="lantai"]')
            cy.get('form').submit()
        })
    })
})