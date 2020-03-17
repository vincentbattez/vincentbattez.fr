import React from 'react'
import './navbar.component.scss'

export function Navbar() {
  return (
    <nav className="main-navbar container mt-3">
      <div className="main-navbar__container col-12">
        <a
          href="#"
          className="main-navbar__text"
        >
        <span className="main-navbar__dot mr-3" />
          <span className="link">Disponible pour mission freelance</span>
        </a>
      </div>
    </nav>
  )
}
