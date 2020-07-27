import React from "react";

import './imageSection.component.scss'

export function ImageSection({ image }: ImageSection) {
  return (
    <div className="image-section col-5">
      <img
        src={`${process.env.REACT_APP_BACKEND_URL}${image.url}`}
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
