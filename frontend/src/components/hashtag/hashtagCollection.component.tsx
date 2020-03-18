import React from 'react'
import { useQuery } from "@apollo/react-hooks";

import './hashtagCollection.component.scss'
import HASHTAG_QUERY from "../../services/hashtag.service";
import { Hashtag } from "./hashtag.component";

export function HashtagCollection() {
  const { loading, error, data } = useQuery(HASHTAG_QUERY); // @refactor: no api call in component

  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;

  const hashtagsCollection = data.hashtags;

  return (
    <ul className="hashtag-collection col-12 mb-3">
      {hashtagsCollection.map((hashtag:any) => (
        <li className="hashtag-item">
          <Hashtag
            label={hashtag.label}
            hashtagType={hashtag.hashtag_type}
          />
        </li>
      ))}
    </ul>
  )
}
