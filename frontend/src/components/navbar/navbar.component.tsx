import React from 'react'
import { useQuery } from "@apollo/react-hooks";

import './navbar.component.scss'
import NAVBAR_QUERY from "../../services/navbar.service";

export function Navbar() {
  const { loading, error, data } = useQuery(NAVBAR_QUERY); // @refactor: no api call in component

  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;

  const { navbar } = data;
  const isAvailable = navbar.isAvailable
  const disabledClassName = isAvailable
    ? ''
    : 'disabled'
  const LinkTag = isAvailable
    ? 'a'
    : 'span'
  const linkTagData = isAvailable
    ? {
      href:navbar.Link.url,
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
            {navbar.Link.label}
          </span>
        </LinkTag>
      </div>
    </nav>
  )
}
