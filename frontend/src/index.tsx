import React from 'react';
import ReactDOM from 'react-dom';

import { ApolloProvider } from "react-apollo";
import client from "./utils/apolloClient";

import { Homepage } from './pages/homepage/homepage.component';
import { Navbar } from "./components/navbar/navbar.component";
import { HashtagCollection } from "./components/hashtag/hashtagCollection.component";

import './styles/index.scss';
import * as serviceWorker from './serviceWorker';


ReactDOM.render(
  <ApolloProvider client={client}>
    <Navbar />
    <Homepage />
    <div className="container">
      <HashtagCollection />
    </div>
  </ApolloProvider>,
  document.getElementById("root")
);

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();
