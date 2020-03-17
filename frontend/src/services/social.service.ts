import gql from "graphql-tag";

const SOCIAL_COLLECTION_QUERY = gql`
    query {
      socials {
        url
        image {
          url
        }
      }
    }
`;

export default SOCIAL_COLLECTION_QUERY;
