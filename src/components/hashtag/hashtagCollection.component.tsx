import React from 'react'

import './hashtagCollection.component.scss'
import { Hashtag } from "./hashtag.component";
import {hashtagCollectionData} from "../../data/homepage/hashtagCollection.data";

export function HashtagCollection() {
  return (
    <ul className="hashtag-collection col-12 mb-3">
      {hashtagCollectionData.map((hashtag:any) => (
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
