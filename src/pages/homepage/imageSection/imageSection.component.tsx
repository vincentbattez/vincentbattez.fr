import React from "react";

import './imageSection.component.scss'

export function ImageSection({ image }: ImageSection) {
  return (
    <div className="image-section col-5">
      <img
        src={image.url}
        alt="Vincent Battez vectoriel"
      />
    </div>
  )
}

type ImageSection = {
  image: {
    url: string
  }
}
