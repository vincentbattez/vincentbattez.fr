import gql from "graphql-tag";

const HOMEPAGE_QUERY = gql`
    {
      homepage {
          subTitle
          title
          description
          image {
              url
          }
          cv {
              label
              url
          }
      }
    }
`;

export default HOMEPAGE_QUERY;
