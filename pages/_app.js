
import "./../styles/globals.css";
import Layout from "../components/Layout/Layout";
export const config = {unstable_runtimeJS: false}
function MyApp({ Component, pageProps }) {
  return (
    <>
      <Layout>
        <Component {...pageProps} />
      </Layout>
    </>
  );
}

export default MyApp;
