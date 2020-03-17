import React from 'react'
import { useQuery } from "@apollo/react-hooks";

import './navbar.component.scss'
import NAVBAR_QUERY from "../../services/navbar.service";

export function Navbar() {
  const { loading, error, data } = useQuery(NAVBAR_QUERY); // @refactor: no api call in component

  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;

  const { navbar } = data;

  return (
    <nav className="main-navbar container mt-3">
      <div className="main-navbar__container col-12">
        <a
          href={navbar.Link.url}
          className="main-navbar__text"
        >
        <span className="main-navbar__dot mr-3" />
          <span className="link">{navbar.Link.label}</span>
        </a>
      </div>
    </nav>
  )
}
