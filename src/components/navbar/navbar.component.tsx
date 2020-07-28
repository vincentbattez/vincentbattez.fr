import React from 'react'

import './navbar.component.scss'
import {navbarData} from "../../data/homepage/navbar.data";

export function Navbar() {
  const isAvailable = navbarData.isAvailable
  const disabledClassName = isAvailable
    ? ''
    : 'disabled'
  const LinkTag = isAvailable
    ? 'a'
    : 'span'
  const linkTagData = isAvailable
    ? {
      href:navbarData.link.url,
      target:"_blank",
      rel:"noopener noreferrer"
    }
    : ''

  return (
    <nav className={`main-navbar container mt-3 ${disabledClassName}`}>
      <div className="main-navbar__container col-12">
        <LinkTag
          className="main-navbar__text"
          {...linkTagData}
        >
        <span className="main-navbar__dot mr-3" />
          <span className={`link ${disabledClassName}`}>
            {navbarData.link.label}
            <img
              className="icon icon-external-link"
              src="/assets/icons/external-link.svg"
              alt=""
            />
          </span>
        </LinkTag>
      </div>
    </nav>
  )
}
