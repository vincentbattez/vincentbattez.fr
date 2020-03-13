import React from "react";

import './imageSection.component.scss'

export function ImageSection({ image }: ImageSection) {
  return (
    <div className="image-section col-6">
      <img
        src={`http://localhost:1337/${image.url}`}
        alt=""
      />
    </div>
  )
}

type ImageSection = {
  image: {
    url: string

  }
}
